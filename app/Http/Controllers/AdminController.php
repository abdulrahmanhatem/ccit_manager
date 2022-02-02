<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\HTTP\Requests\adminRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isAdmin() && !auth()->user()->isPM() && !auth()->user()->isPM()){
            $admins = User::where('role_id', 1)->orderBy('updated_at', 'desc')->paginate(20);
            $all = User::where('role_id', 1)->get();
            return view('admins.index', compact('admins', 'all'));
        }else{
            return redirect()->back();
        }
    }

    public function search(Request $request)
    {
        if(auth()->user()->isAdmin() && !auth()->user()->isPM() && !auth()->user()->isPM()){
            $name = $request->input('search');
            $admins = User::where([['role_id', 1],['first_name', 'LIKE', "%".$name."%"] ])->orWhere([['role_id', 1],['last_name', 'LIKE', "%".$name."%"] ] )->orWhere([['role_id', 1],['email', 'LIKE', "%".$name."%" ] ])->orWhere([['role_id', 1],['phone', 'LIKE', "%".$name."%"] ] );
            $admins = $admins->orderBy('updated_at', 'desc')->paginate(20);
            $admins->appends($request->all())->links();
            $data = array(
                'admins' => $admins, 
            );
            
            return view('admins.index')->with($data);
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
        if(auth()->user()->isAdmin() && !auth()->user()->isPM() && !auth()->user()->isPM()){
            return view('admins.create');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->isAdmin() && !auth()->user()->isPM() ){
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|unique:users',
                'avatar' => 'image|nullable|max:1999',
                'phone' => 'required',
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
            $input['password'] = bcrypt($input['password']);
            User::create($input);
            return redirect()->back()->with('success', 'Admin Added');
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
        if(auth()->user()->isAdmin() && !auth()->user()->isPM()){
            $admin = User::findOrFail($id);
            return view('admins.show', compact('admin'));
        }else{
            return redirect()->back();
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
        if(auth()->user()->isAdmin() && !auth()->user()->isPM()){
            $admin = User::findOrFail($id);
            return view('admins.edit', compact('admin'));
        }else{
            return redirect()->back();
        }
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
        if(auth()->user()->isAdmin() && !auth()->user()->isPM()){
            $this->validate($request, [
                'name' => 'required',
                'avatar' => 'image|nullable|max:1999',
                'phone' => 'required',
            ]);
            $admin = User::findOrFail($id);
            $input = $request->all();
            if($request->hasFile('avatar')){
                $filenameWithExt = $request->file('avatar')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('avatar')->getClientOriginalExtension();
                $avatar = $filename.'_'.time().'.'.$extension;
                $input['avatar'] = $avatar;
                $request->file('avatar')->move(base_path('/uploads/images/avatars'), $avatar);
            }
            $input['password'] = bcrypt($input['password']);
            $admin->update($input);
            return redirect()->back()->with('success', 'Admin Updated');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->isAdmin() && !auth()->user()->isPM()){
            $admin = User::findOrFail($id);
            $admin->delete();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
}
