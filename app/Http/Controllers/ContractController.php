<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(auth()->user()->isAdmin()){
            $all = Contract::all();
            $contracts = Contract::orderBy('updated_at', 'desc')->paginate(20);
            return view('contracts.index', compact('contracts', 'all'));
        }else{
            return redirect()->back();
        }
    }



    public function search(Request $request)
    {
        if(auth()->user()->isAdmin()){
            $name = $request->input('search');
            
            if($request->has('search')){
                if(!empty($request->input('search'))){
                $contracts = contract::where('name', 'LIKE', "%".$name."%")->orWhere('email', 'LIKE', "%".$name."%" )->orWhere('phone', 'LIKE', "%".$name."%" );
                }
            }

            $contracts = $contracts->orderBy('updated_at', 'desc')->paginate(20);
            $contracts->appends($request->all())->links();
            $data = array(
                'contracts' => $contracts, 
            );
            
            
            return view('contracts.index');
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
        if(auth()->user()->isAdmin()){
            return view('contracts.create');
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
        if(auth()->user()->isAdmin()){
            $this->validate($request, [
                'project_id' => 'required',
                'grand_total' => 'required',
                'docs' => 'required|nullable|mimes:pdf|max:5000',
            ]);
            
            
            $input = $request->all();
            // $adress = $request->input('[0][invoice]');
            // if($request->has('invoice')){
                
            // }

            if($request->hasFile('docs')){
                $filenameWithExt = $request->file('docs')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('docs')->getClientOriginalExtension();
                $docs = $filename.'_'.time().'.'.$extension;
                // Upload Image
                //$path = $request->file('avatar')->storeAs('public/avatar', $filenameToStore);
                $request->file('docs')->move(base_path('/uploads/files/contracts'), $docs);
                $input['docs'] = $docs;
            }
        
            Contract::create($input);
            return redirect()->back()->with('success', 'Contract Added');
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
        if(auth()->user()->isAdmin()){
            $contract = Contract::findOrFail($id);
            return view('contracts.show', compact('contract'));
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
        if(auth()->user()->isAdmin()){
        $contract = Contract::findOrFail($id);
        return view('contracts.edit', compact('contract'));
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
        if(auth()->user()->isAdmin()){
            $this->validate($request, [
                'grand_total' => 'required',
                'project_id' => 'required',
                'docs' => 'nullable|mimes:pdf|max:5000',
            ]);
            $contract = Contract::findOrFail($id);
            $input = $request->all();
            if($request->hasFile('docs')){
                $filenameWithExt = $request->file('docs')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('docs')->getClientOriginalExtension();
                $docs = $filename.'_'.time().'.'.$extension;
                // Upload Image
                //$path = $request->file('avatar')->storeAs('public/avatar', $filenameToStore);
                $request->file('docs')->move(base_path('/uploads/files/contracts'), $docs);
                $input['docs'] = $docs;
            }
            
            $contract->update($input);
            return redirect()->back()->with('success', 'Contract Updated');
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
        if(auth()->user()->isAdmin()){
            $contract = Contract::findOrFail($id);
            $contract->delete();
        }else{
            return redirect()->back();
        }
    }
}
