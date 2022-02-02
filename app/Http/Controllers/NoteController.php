<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class NoteController extends Controller
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
        if(auth()->user()->role->name != 'customer'){
            $this->validate($request, [
                'project_id' => 'required',
                'user_id' => 'required',
                'note' => 'required',
                'docs' => 'nullable|mimes:jpeg,png,jpg,gif,svg,doc,pdf|max:2999',
            ]);

            $input = $request->all();
            Note::create($input);
            return redirect()->back()->with('success', 'Note Added');
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
        if(auth()->user()->role->name != 'customer'){
            $this->validate($request, [
                'project_id' => 'required',
                'user_id' => 'required',
                'note' => 'required',
                'docs' => 'nullable|mimes:jpeg,png,jpg,gif,svg,doc,pdf|max:2999',
            ]);
            $input = $request->all();
            $note = Note::findOrFail($id);
            $note->update($input);
            return redirect()->back()->with('success', 'Note Updated');
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
        //
    }
}
