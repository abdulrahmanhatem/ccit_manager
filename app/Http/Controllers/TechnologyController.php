<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Technology;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(auth()->user()->isAdmin() || auth()->user()->isPM() ){
            if(auth()->user()->isAdmin()){
                $all = Technology::all();
                $technologies = Technology::orderBy('updated_at', 'desc')->paginate(20);
                return view('technologies.index', compact('technologies', 'all'));
            }
        }
    }



    public function search(Request $request)
    {
        // $name = $request->input('search');
        
        // if($request->has('search')){
        //     if(!empty($request->input('search'))){
        //     $quotes = technology::where('name', 'LIKE', "%".$name."%")->orWhere('email', 'LIKE', "%".$name."%" )->orWhere('phone', 'LIKE', "%".$name."%" );
        //     }
        // }

        // $quotes = $quotes->orderBy('updated_at', 'desc')->paginate(20);
        // $quotes->appends($request->all())->links();
        // $data = array(
        //     'quotes' => $quotes, 
        // );
        
        return view('quotes.index');
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('technologies.create');
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
            if(auth()->user()->isAdmin()){
                $this->validate($request, [
                    'name' => 'required',
                    'avatar' => 'required',
                ]);

                $input = $request->all();
                if($request->hasFile('avatar')){
                    $filenameWithExt = $request->file('avatar')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('avatar')->getClientOriginalExtension();
                    $avatar = $filename.'_'.time().'.'.$extension;
                    $input['avatar'] = $avatar;
                    $request->file('avatar')->move(base_path('/uploads/images/logos/technologies'), $avatar);
                }
                Technology::create($input);
                return redirect('/technologies')->with('success', 'Technology Added');
            }
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
        if(auth()->user()->isAdmin() || auth()->user()->isPM() ){
            $technology = Technology::findOrFail($id);
            return view('technologies.show', compact('technology'));
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
        if(auth()->user()->isAdmin()){
            $technology = Technology::findOrFail($id);
            return view('technologies.edit', compact('technology'));
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
        if(auth()->user()->isAdmin()){
            $this->validate($request, [
                'name' => 'required',
                'avatar' => 'required',
            ]);
            $technology = Technology::findOrFail($id);
            $input = $request->all();
            if($request->hasFile('avatar')){
                $filenameWithExt = $request->file('avatar')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('avatar')->getClientOriginalExtension();
                $avatar = $filename.'_'.time().'.'.$extension;
                $input['avatar'] = $avatar;
                $request->file('avatar')->move(base_path('/uploads/images/logos/technologies'), $avatar);
            }
            $technology->update($input);
            return redirect('/technologies')->with('success', 'Technology Updated');
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
        if(auth()->user()->isAdmin()){
            $technology = Technology::findOrFail($id);
            $technology->delete();
            return redirect('/technologies')->with('success', 'Technology Removed');
        }
    }
}
