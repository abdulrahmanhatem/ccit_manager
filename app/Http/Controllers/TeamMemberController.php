<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\HTTP\Requests\memberRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isAdmin() || auth()->user()->isPM() ){
            $members = User::where('role_id', 3)->orderBy('updated_at', 'desc')->paginate(20);
            $all = User::where('role_id', 3)->get();
            $search = '';
            return view('members.index', compact('members', 'all', 'search'));
        }else{
            return redirect()->back();
        }
    }

    public function search(Request $request)
    {
        if(auth()->user()->isAdmin() || auth()->user()->isPM() ){
            $search = $request->input('search');
            $members = User::where([['role_id', 3],['first_name', 'LIKE', "%".$search."%"] ])->orWhere([['role_id', 3],['last_name', 'LIKE', "%".$search."%"] ] )
            ->orWhere([['role_id', 3],['name', 'LIKE', "%".$search."%" ] ])->orWhere([['role_id', 3],['email', 'LIKE', "%".$search."%" ] ])->orWhere([['role_id', 3],['phone', 'LIKE', "%".$search."%"] ] );
            $members = $members->orderBy('updated_at', 'desc')->paginate(20);
            $members->appends($request->all())->links();
            $data = array(
                'members' => $members, 
                'search' => $search, 
            );
            
            return view('members.index')->with($data);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->isAdmin() || auth()->user()->isPM() ){
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|unique:users',
                'avatar' => 'image|nullable|max:1999',
                'phone' => 'required',
                'password' => 'required|min:6',
            ]);

            $input = $request->all();
            if($request->hasFile('avatar')){
                $filenameWithExt = $request->file('avatar')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('avatar')->getClientOriginalExtension();
                $avatar = $filename.'_'.time().'.'.$extension;
                // Upload Image
                //$path = $request->file('avatar')->storeAs('public/avatar', $filenameToStore);
                $request->file('avatar')->move(base_path('/uploads/images/avatars'), $avatar);
            }
            if($request->hasFile('avatar')){
                $input['avatar'] = $avatar;
            }else{
                $input['avatar'] = '';
            }
            $input['role_id'] = 3;
            $input['password'] = bcrypt($input['password']);
            User::create($input);
            return redirect('/team')->with('success', 'member Added');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = User::findOrFail($id);
        if(auth()->user()->isAdmin()){
            return view('members.show', compact('member'));
        }elseif(auth()->user()->isTeamMember()){
            if(auth()->user()->id == $id){
                return view('members.show', compact('member'));
            }else{
                return redirect()->back();
            }
        }else{
            redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = User::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'avatar' => 'image|nullable|max:1999',
            'phone' => 'required',
            'password' => 'nullable',
        ]);
        $member = User::findOrFail($id);
        $input = $request->all();
        if($request->hasFile('avatar')){
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $avatar = $filename.'_'.time().'.'.$extension;
            $input['avatar'] = $avatar;
            $request->file('avatar')->move(base_path('/uploads/images/avatars'), $avatar);
        }
        if(trim($request->password) == '') {
            $input = $request->except('password'); //pass everything excerpt the pass field
        } else {
            $input['password'] = bcrypt($input['password']);
        } 
        $input['role_id'] = 3;
        $member->update($input);
        return redirect('/team')->with('success', 'member Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = User::findOrFail($id);
        $member->delete();
        return redirect()->back();
    }
}
