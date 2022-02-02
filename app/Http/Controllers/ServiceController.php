<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(auth()->user()->isAdmin()){
            $all = Service::all();
            $services = Service::orderBy('updated_at', 'desc')->paginate(20);
            return view('services.index', compact('services', 'all'));
        }else{
            return redirect()->back();
        }
    }



    public function search(Request $request)
    {
        // $name = $request->input('search');
        
        // if($request->has('search')){
        //     if(!empty($request->input('search'))){
        //     $quotes = service::where('name', 'LIKE', "%".$name."%")->orWhere('email', 'LIKE', "%".$name."%" )->orWhere('phone', 'LIKE', "%".$name."%" );
        //     }
        // }

        // $quotes = $quotes->orderBy('updated_at', 'desc')->paginate(20);
        // $quotes->appends($request->all())->links();
        // $data = array(
        //     'quotes' => $quotes, 
        // );
        
        return view('sevices.index');
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
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
                'name_ar' => 'required',
            ]);
            $input = $request->all();
            Service::create($input);
            return redirect('/services')->with('success', 'Service Added');
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
        $service = Service::findOrFail($id);
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
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
                'name_ar' => 'required',
            ]);
            $service = Service::findOrFail($id);
            $input = $request->all();
            $service->update($input);
            return redirect('/services')->with('success', 'Service Updated');
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
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect('/services')->with('success', 'Service Removed');
    }
}
