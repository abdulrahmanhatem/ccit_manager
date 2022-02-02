<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'user_id' => 'required',
            'task_id' => 'required',
            'text' => 'required',
            'docs' => 'nullable|mimes:jpeg,png,jpg,gif,svg,doc,pdf|max:2999',
        ]);


        $input = $request->all();
        if($request->hasFile('docs')){
            $filenameWithExt = $request->file('docs')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('docs')->getClientOriginalExtension();
            $docs = $filename.'_'.time().'.'.$extension;
            $input['docs'] = $docs;
            // Upload Image
            //$path = $request->file('avatar')->storeAs('public/avatar', $filenameToStore);
            $request->file('docs')->move(base_path('/uploads/files/tasks/comments'), $docs);
        }
        Comment::create($input);
        return redirect()->back()->with('success', 'Comment Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if($request->has('mark-change')){
            $comment = Comment::findOrFail($id);
            $comment->marked = $request->input('marked');
            $comment->save();
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
        //
    }
}
