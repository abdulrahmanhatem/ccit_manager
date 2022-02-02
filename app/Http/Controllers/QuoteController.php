<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HTTP\Requests\QuoteUpdateRequest;
use App\Quote;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isAdmin()){
            // $quotes = json_encode(Quote::all());
            $all = Quote::all();
            $quotes = Quote::orderBy('updated_at', 'desc')->paginate(20);
            return view('quotes.index', compact('all', 'quotes'));
        }else{
            return redirect()->back();
        }
    }

    public function search(Request $request)
    {
        if(auth()->user()->isAdmin()){
            $name = $request->input('search');
            $quotes = Quote::where('id', '!=', null);
            if($request->has('status')){
                if(!empty($request->input('status'))){
                    $status= $request->input('status');
                    $quotes = $quotes->where('status', $status);
                }
            }
            if($request->has('search')){
                if(!empty($request->input('search'))){
                $quotes = Quote::where('name', 'LIKE', "%".$name."%")->orWhere('email', 'LIKE', "%".$name."%" )->orWhere('phone', 'LIKE', "%".$name."%" );
                }
            }

            $quotes = $quotes->orderBy('updated_at', 'desc')->paginate(20);
            $quotes->appends($request->all())->links();
            $data = array(
                'quotes' => $quotes, 
            );
            
            return view('quotes.index')->with($data);
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
        return view('quotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quote = new Quote;
        $quote->name = $request->input('name');
        $quote->email = $request->input('email');
        $quote->phone = $request->input('phone');
        $quote->city = $request->input('city');
        $quote->features = $request->input('features');
        $quote->services = $request->input('services');
        $quote->project_link = $request->input('project_link');
        $quote->budget = $request->input('budget');
        $quote->save();
        // Sending Email
        /*$view = view('email_templates.quotation')->render();
        $subject = 'CCIT Quotation';
        $message_body = $view;
        

        $find = array_keys($list);
        $replace = array_values($list);
        $message = str_ireplace($find, $replace, $message_body);
        $mail = Helper::send_email($to, $subject, $message);*/
        // $to = [$request->input('email'), 'abdulrahman@CCIT.com'];
        // $subject = 'CCIT Quotation';
        // $message = 'Your Quatation Is Sent';
        // $from = 'sales@CCIT.com';
        // $fromname = 'sales@CCIT.com';


        // Helper::send_email($to='',$subject='',$message='',$from='',$fromname='');
        return redirect()->back();
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
        $quote = Quote::findOrFail($id);
        return view('quotes.show', compact('quote'));
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
        $quote = Quote::findOrFail($id);
        $quote->status = 2;
        $quote->save();
        dd($quote);
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
            'docs' => 'nullable|mimes:pdf|max:5000',
        ]);

        if($request->has('send-proposal')){
            $quote = Quote::findOrFail($request->input('quote_id'));
            $input = $request->all();
            if($request->hasFile('docs')){
                $filenameWithExt = $request->file('docs')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('docs')->getClientOriginalExtension();
                $docs = $filename.'_'.time().'.'.$extension;
                // Upload Image
                //$path = $request->file('avatar')->storeAs('public/avatar', $filenameToStore);
                $request->file('docs')->move(base_path('/uploads/files/quotes'), $docs);
            }
            if($request->hasFile('docs')){
                $input['docs'] = $docs;
            }else{
                $input['docs'] = '';
            }
            $input['status'] = 2;
            $quote->update($input);
        }

        if($request->has('close-quote')){
            $quote = Quote::findOrFail($request->input('quote_id'));
            $quote->status = 2;
            $quote->save();
        }
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quote = Quote::findOrFail($id);
        $quote->delete();
        return redirect()->back();
    }
}
