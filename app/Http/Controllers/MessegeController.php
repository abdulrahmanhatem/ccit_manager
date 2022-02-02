<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messege;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class MessegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $all = Messege::all();
        $messeges = Messege::orderBy('updated_at', 'desc')->paginate(20);
        return view('messeges.index', compact('messeges', 'all'));
    }



    public function search(Request $request)
    {
        // $name = $request->input('search');
        
        // if($request->has('search')){
        //     if(!empty($request->input('search'))){
        //     $quotes = Messege::where('name', 'LIKE', "%".$name."%")->orWhere('email', 'LIKE', "%".$name."%" )->orWhere('phone', 'LIKE', "%".$name."%" );
        //     }
        // }

        // $quotes = $quotes->orderBy('updated_at', 'desc')->paginate(20);
        // $quotes->appends($request->all())->links();
        // $data = array(
        //     'quotes' => $quotes, 
        // );
        
        // return view('quotes.index');
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messeges.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'messege' => 'required',
        //     'docs' => 'nullable|mimes:jpeg,png,jpg,gif,svg,doc,pdf|max:2999',
        // ]);

        $input = $request->all();
        if($request->hasFile('docs')){
            $filenameWithExt = $request->file('docs')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('docs')->getClientOriginalExtension();
            $docs = $filename.'_'.time().'.'.$extension;
            $input['docs'] = $docs;
            // Upload Image
            //$path = $request->file('avatar')->storeAs('public/avatar', $filenameToStore);
            $request->file('docs')->move(base_path('/uploads/files/messeges'), $docs);
        }
        Messege::create($input);
        return redirect()->back()->with('success', 'Messege Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messege = Messege::findOrFail($id);
        return view('messeges.show', compact('messege'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $messege = Messege::findOrFail($id);
        return view('messeges.edit', compact('messege'));
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
            'user_id' => 'required',
            'docs' => 'nullable|mimes:pdf|max:5000',
        ]);
        $messege = Messege::findOrFail($id);
        $input = $request->all();

        if($request->hasFile('docs')){
            $filenameWithExt = $request->file('docs')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('docs')->getClientOriginalExtension();
            $docs = $filename.'_'.time().'.'.$extension;
            // Upload Image
            //$path = $request->file('avatar')->storeAs('public/avatar', $filenameToStore);
            $request->file('docs')->move(base_path('/uploads/files/messeges'), $docs);
        }
        if($request->hasFile('docs')){
            $input['docs'] = $docs;
        }
        $messege->update($input);
        return redirect('/messeges')->with('success', 'Messege Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $messege = Messege::findOrFail($id);
        $messege->delete();
    }
}
