<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Setting;
use App\HTTP\Requests\CustomerRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isAdmin()){
            $vat = Setting::orderBy('updated_at', 'desc')->first()->vat;
            $all = Invoice::all();
            $invoices = Invoice::orderBy('updated_at', 'desc')->paginate(20);
            $search = '';
            return view('invoices.index', compact('invoices', 'all', 'search', 'vat'));
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
        $vat = Setting::orderBy('updated_at', 'desc')->first()->vat;
        return view('invoices.create', compact('vat'));
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
                'user_id' => 'required',
                'date' => 'required',
                'docs' => 'nullable|mimes:pdf|max:5000',
            ]);

            $input = $request->all();
            if($request->hasFile('docs')){
                $filenameWithExt = $request->file('docs')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('docs')->getClientOriginalExtension();
                $docs = $filename.'_'.time().'.'.$extension;
                // Upload Image
                //$path = $request->file('docs')->storeAs('public/docs', $filenameToStore);
                $request->file('docs')->move(base_path('/uploads/docs/invoices'), $docs);
                $input['docs'] = $docs;
            }
            if($request->hasFile('docs')){
                $input['docs'] = $docs;
            }else{
                $input['docs'] = '';
            }
            if($request->has('order')){
                foreach($request->input('order') as $key => $number){
                    if($key == 0){
                        $input['service_1']  = $number['service'];
                        $input['service_1_price']  = (int) $number['price'];
                        $input['qty_1']  = (int) $number['qty'];
                    }
                    if($key == 1){
                        $input['service_2']  = $number['service'];
                        $input['service_2_price']  = (int) $number['price'];
                        $input['qty_2']  = (int) $number['qty'];
                    }
                    if($key == 2){
                        $input['service_3']  = $number['service'];
                        $input['service_3_price']  = (int) $number['price'];
                        $input['qty_3']  = (int) $number['qty'];
                    }
                    if($key == 3){
                        $input['service_4']  = $number['service'];
                        $input['service_4_price']  = (int) $number['price'];
                        $input['qty_4']  = (int) $number['qty'];
                    }
                    if($key == 4){
                        $input['service_5']  = $number['service'];
                        $input['service_5_price']  = (int) $number['price'];
                        $input['qty_5']  = (int) $number['qty'];
                    }
                }
            }
            $last = Invoice::orderBy('created_at', 'desc')->first();
            $gen = $last->id; // This is fetched from database
            $gen++;
            $invoice_number = sprintf('%07d', $gen);
            
            $input['invoice_no'] = 'f-'.$invoice_number;
            Invoice::create($input);
            return redirect()->back()->with('success', 'Invoice Created');
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
            $invoice = Invoice::findOrFail($id);
            return view('invoices.show', compact('invoice'));
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
        
        $vat = Setting::orderBy('updated_at', 'desc')->first()->vat;
        $invoice = Invoice::findOrFail($id);
        return view('invoices.edit', compact('vat', 'invoice'));
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
            $invoice = Invoice::findOrFail($id);
            $input = $request->all();
            
            if($request->has('update_status')){
                // dd($request->all());
                $invoice->status = $input['status'];
                $invoice->save();

                // return redirect()->back();
            }else{
                $this->validate($request, [
                    'name' => 'required',
                ]);
                
                if($request->hasFile('docs')){
                    $filenameWithExt = $request->file('docs')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('docs')->getClientOriginalExtension();
                    $docs = $filename.'_'.time().'.'.$extension;
                    // Upload Image
                    //$path = $request->file('docs')->storeAs('public/docs', $filenameToStore);
                    $request->file('docs')->move(base_path('/uploads/docs/invoices'), $docs);
                    $input['docs'] = $docs;
                }
                if($request->hasFile('docs')){
                    $input['docs'] = $docs;
                }else{
                    $input['docs'] = '';
                }
                if($request->has('order')){
                    foreach($request->input('order') as $key => $number){
                        if($key == 0){
                            $input['service_1']  = $number['service'];
                            $input['service_1_price']  = (int) $number['price'];
                            $input['qty_1']  = (int) $number['qty'];
                        }
                        if($key == 1){
                            $input['service_2']  = $number['service'];
                            $input['service_2_price']  = (int) $number['price'];
                            $input['qty_2']  = (int) $number['qty'];
                        }
                        if($key == 2){
                            $input['service_3']  = $number['service'];
                            $input['service_3_price']  = (int) $number['price'];
                            $input['qty_3']  = (int) $number['qty'];
                        }
                        if($key == 3){
                            $input['service_4']  = $number['service'];
                            $input['service_4_price']  = (int) $number['price'];
                            $input['qty_4']  = (int) $number['qty'];
                        }
                        if($key == 4){
                            $input['service_5']  = $number['service'];
                            $input['service_5_price']  = (int) $number['price'];
                            $input['qty_5']  = (int) $number['qty'];
                        }
                    }
                }
                $last = Invoice::orderBy('created_at', 'desc')->first();
                $gen = $last->id; // This is fetched from database
                $gen++;
                $invoice_number = sprintf('%07d', $gen);
                $input['invoice_no'] = 'f-'.$invoice_number;
                $invoice::update($input);
                return redirect()->back()->with('success', 'Invoice Updated');
            }
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
        $customer = Invoice::findOrFail($id);
        $customer->delete();
    }

    // public function download($id)
    // {
        
    //     $invoice = Invoice::findOrFail($id);

    //     //PDF file is stored under project/public/download/info.pdf
    //     $invoice = $user->id;
    //     $file= base_path(). '/uploads/files/cv/'. $cv;
    //     $headers = array(
    //         'Content-Type: application/pdf',
    //         'Content-Type: image/png',
    //         'Content-Type: image/jpg'
    //     );
        
    //     if($user->cv){
    //         if (file_exists($file)) {
    //             return response()->download($file, $user->cv, $headers);
    //         }else{
    //             return Redirect::back()->with('error', trans("main.Worker Didn't Upload CV"));
    //         }
    //     }else{
    //         return Redirect::back()->with('error', trans("main.Worker Didn't Upload CV"));
    //     }
    // }
}
