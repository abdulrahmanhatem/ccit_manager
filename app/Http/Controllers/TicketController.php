<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isAdmin()){
            $tickets = Ticket::where('ticket_id', 0)->orderBy('updated_at', 'desc')->paginate(20);
            $all = Ticket::where('ticket_id', 0)->get();
            $search = '';
            $category = '';
            $status = '';
            return view('tickets.index', compact('tickets', 'all', 'search', 'category', 'status'));
        }else{
            return redirect()->back();
        }
    }



    public function search(Request $request)
    {
        if(auth()->user()->isAdmin()){
            $search = $request->input('search');
            $category = $request->input('category');
            $status = $request->input('status');
            $tickets = Ticket::where('ticket_id', 0)->where('id', 'Like', $search);

            

            if($request->has('category')){
                if(!empty($request->input('category'))){
                    if($request->input('category')  != 'all'){
                        $category= $request->input('category');
                        $tickets = $tickets->where('category', $category);
                    }  
                }
            }

            if($request->has('status')){
                if(!empty($request->input('status') || $request->input('status') == 0)){
                    if($request->input('status')  != 'all'){
                        $status= $request->input('status');
                        $tickets = $tickets->where('status', $status);
                    }  
                }
            }
            
            $tickets = $tickets->orderBy('updated_at', 'desc')->paginate(20);
            $tickets->appends($request->all())->links();
            $data = array(
                'tickets' => $tickets, 
                'search' => $search, 
                'category' => $category, 
                'status' => $status, 
                
            );
            
            return view('tickets.index')->with($data);
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
                'sender_id' => 'required',
                'subject' => 'required',
                'text' => 'required',
                'docs' => 'nullable|mimes:jpeg,png,jpg,gif,svg,doc,pdf|max:2999',
            ]);

            $input = $request->all();

            // dd($input);
            if($request->hasFile('docs')){
                $filenameWithExt = $request->file('docs')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('docs')->getClientOriginalExtension();
                $docs = $filename.'_'.time().'.'.$extension;
                $input['docs'] = $docs;
                // Upload Image
                //$path = $request->file('avatar')->storeAs('public/avatar', $filenameToStore);
                $request->file('docs')->move(base_path('/uploads/files/tickets'), $docs);
            }
            Ticket::create($input);
            
            if($request->has('send-messege')){
                $main = Ticket::findOrFail( $request->input('ticket_id') );
                if($request->has('customer')){
                    $main->status = 1;
                }
                if($request->has('non_customer')){
                    $main->status = 2;
                }
                ;
                $main->save();
                return redirect()->back()->with('success', 'Messege Added');
            }
            return redirect()->back()->with('success', 'Ticket Added');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->user()->isAdmin() || auth()->user()->isCustomer()){
            $ticket = Ticket::findOrFail($id);
            return view('tickets.show', compact('ticket'));
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
        if(auth()->user()->isAdmin() || auth()->user()->isCustomer()){
        $ticket = Ticket::findOrFail($id);
        return view('tickets.edit', compact('ticket'));
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
    public function update(Request $request, $id){
        if(auth()->user()->isAdmin() || auth()->user()->isCustomer()){
            if($request->has('change-status')){
                $ticket = Ticket::findOrFail($id);
                $ticket->status = $request->input('status');
                $ticket->save();
            }else{
                $this->validate($request, [
                    'sender_id' => 'required',
                    'subject' => 'required',
                    'text' => 'required',
                    'docs' => 'nullable|mimes:jpeg,png,jpg,gif,svg,doc,pdf|max:2999',
                ]);
        
                $input = $request->all();
                $ticket = Ticket::findOrFail($id);
                if($request->hasFile('docs')){
                    $filenameWithExt = $request->file('docs')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('docs')->getClientOriginalExtension();
                    $docs = $filename.'_'.time().'.'.$extension;
                    $input['docs'] = $docs;
                    // Upload Image
                    //$path = $request->file('avatar')->storeAs('public/avatar', $filenameToStore);
                    $request->file('docs')->move(base_path('/uploads/files/tickets'), $docs);
                }
                $ticket->update($input);
            }
            return redirect()->back()->with('success', 'Ticket Updated');
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
        if(auth()->user()->isAdmin() || auth()->user()->isCustomer()){
            $ticket = Ticket::findOrFail($id);
            $ticket->delete();
            return redirect()->back()->with('success', 'Messege Deleted');
        }else{
            return redirect()->back();
        }
    }
}
