<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(auth()->user()->isAdmin()){
            $all = Proposal::all();
            $proposals = Proposal::orderBy('updated_at', 'desc')->paginate(20);
            return view('proposals.index', compact('proposals', 'all'));
        }else{
            return redirect()->back();
        }
    }



    public function search(Request $request)
    {
        // $name = $request->input('search');
        
        // if($request->has('search')){
        //     if(!empty($request->input('search'))){
        //     $quotes = Proposal::where('name', 'LIKE', "%".$name."%")->orWhere('email', 'LIKE', "%".$name."%" )->orWhere('phone', 'LIKE', "%".$name."%" );
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
        return view('proposals.create');
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
            'user_id' => 'required',
            'docs' => 'required|nullable|mimes:pdf|max:5000',
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
            $request->file('docs')->move(base_path('/uploads/files/proposals'), $docs);
        }
        Proposal::create($input);
        return redirect()->back()->with('success', 'Proposal Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proposal = Proposal::findOrFail($id);
        return view('proposals.show', compact('proposal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proposal = Proposal::findOrFail($id);
        return view('proposals.edit', compact('proposal'));
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
        $proposal = Proposal::findOrFail($id);
        $input = $request->all();

        if($request->hasFile('docs')){
            $filenameWithExt = $request->file('docs')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('docs')->getClientOriginalExtension();
            $docs = $filename.'_'.time().'.'.$extension;
            // Upload Image
            //$path = $request->file('avatar')->storeAs('public/avatar', $filenameToStore);
            $request->file('docs')->move(base_path('/uploads/files/proposals'), $docs);
        }
        if($request->hasFile('docs')){
            $input['docs'] = $docs;
        }
        $proposal->update($input);
        return redirect('/proposals')->with('success', 'Proposal Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proposal = Proposal::findOrFail($id);
        $proposal->delete();
    }
}
