<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        if(auth()->user()->isAdmin() && !auth()->user()->isPM()){ 
            $setting = Setting::orderBy('created_at', 'asc')->first();
            return view('settings.index', compact('setting'));
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
        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->isAdmin() && !auth()->user()->isPM()){
            $this->validate($request, [
                'vat' => 'required'
            ]);
            $input = $request->all();
            setting::create($input);
            return redirect('/settings')->with('success', 'Setting Added');
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
            $setting = Setting::findOrFail($id);
            return view('settings.show', compact('setting'));
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
            $setting = Setting::findOrFail($id);
            return view('settings.edit', compact('setting'));
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
                'vat' => 'required'
            ]);
            $setting = setting::findOrFail($id);
            $input = $request->all();
            $setting->update($input);
            return redirect('/settings')->with('success', 'settings Updated');
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
            $setting = Setting::findOrFail($id);
            $setting->delete();
        }else{
            return redirect()->back();
        }
    }
}
