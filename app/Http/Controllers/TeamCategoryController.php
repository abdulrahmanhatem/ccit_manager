<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeamCategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class TeamCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(auth()->user()->isAdmin() || auth()->user()->isPM() ){
            $all = TeamCategory::all();
            $categories = TeamCategory::orderBy('updated_at', 'desc')->paginate(20);
            return view('team_categories.index', compact('categories', 'all'));
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
        return view('team_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'avatar' => 'image|nullable|max:1999',
        ]);

        $input = $request->all();
        if($request->hasFile('avatar')){
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $avatar = $filename.'_'.time().'.'.$extension;
            $input['avatar'] = $avatar;
            $request->file('avatar')->move(base_path('/uploads/images/team_categories'), $avatar);
        }
        TeamCategory::create($input);
        return redirect('/team/categories')->with('success', 'Category Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = TeamCategory::findOrFail($id);
        return view('team_categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Teamcategory::findOrFail($id);
        return view('team_categories.edit', compact('category'));
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
        ]);
        $category = TeamCategory::findOrFail($id);
        $input = $request->all();

        if($request->hasFile('avatar')){
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $avatar = $filename.'_'.time().'.'.$extension;
            $input['avatar'] = $avatar;
            $request->file('avatar')->move(base_path('/uploads/images/team_categories'), $avatar);
        }
        $category->update($input);
        return redirect('/team/categories')->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->isAdmin() || auth()->user()->isPM() ){
            $category = Teamcategory::findOrFail($id);
            $category->delete();
            return redirect('/team/categories')->with('success', 'Category Updated');
        }else{
            return redirect()->back();
        }
    }
}
