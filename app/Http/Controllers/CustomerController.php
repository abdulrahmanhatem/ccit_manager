<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\HTTP\Requests\CustomerRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isAdmin()){
            $customers = User::where('role_id', 2)->orderBy('updated_at', 'desc')->paginate(20);
            $all = User::where('role_id', 2)->get();
            return view('customers.index', compact('customers', 'all'));
        }else{
            return redirect()->back();
        }
    }

    public function search(Request $request)
    {
        if(auth()->user()->isAdmin()){
            $name = $request->input('search');
            $customers = User::where([['role_id', 2],['first_name', 'LIKE', "%".$name."%"] ])->orWhere([['role_id', 2],['last_name', 'LIKE', "%".$name."%"] ] )->orWhere([['role_id', 2],['email', 'LIKE', "%".$name."%" ] ])->orWhere([['role_id', 2],['phone', 'LIKE', "%".$name."%"] ] );
            $customers = $customers->orderBy('updated_at', 'desc')->paginate(20);
            $customers->appends($request->all())->links();
            $data = array(
                'customers' => $customers, 
            );
            
            return view('customers.index')->with($data);
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
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->isAdmin()){
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
                $input['avatar'] = $avatar;
                $request->file('avatar')->move(base_path('/uploads/images/avatars'), $avatar);
            }
            $input['password'] = bcrypt($input['password']);
            $input['role_id'] = 2;  
            User::create($input);
            return redirect('/customers')->with('success', 'Customer Created');
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
        $customer = User::findOrFail($id);
        if(auth()->user()->isAdmin() || auth()->user()->isTeamMember()){
            if(auth()->user()->isTeamMember()){
                    return redirect()->back();
            }else{
                return view('customers.show', compact('customer'));
            }

            
        }elseif(auth()->user()->isCustomer()){
            if(auth()->user()->id == $id){
                return view('customers.show', compact('customer'));
            }else{
                abort(404);
            }
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
        $customer = User::findOrFail($id);
        return view('customers.edit', compact('customer'));
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
        if(auth()->user()->isAdmin()){
            $this->validate($request, [
                'name' => 'required',
                'avatar' => 'image|nullable|max:1999',
                'phone' => 'required',
            ]);
            $customer = User::findOrFail($id);
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
            $input['role_id'] = 2;  
            $customer->update($input);
            return redirect('/customers')->with('success', 'Customer Updated');
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
        $customer = User::findOrFail($id);
        $customer->delete();
        return redirect()->back();
    }
}
