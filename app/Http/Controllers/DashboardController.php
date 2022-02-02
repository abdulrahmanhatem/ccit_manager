<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isAdmin()){
            if(auth()->user()->isPM()){
                $search = '';
                $status = '';
                $all = Project::all();
                $projects = Project::orderBy('updated_at', 'desc')->paginate(20);
                return view('projects.index', compact('projects', 'all', 'search', 'status'));
            }else{
                return view('dashboard.index');
            }
        }else{
            if( auth()->user()->isTeamMember()){
                $search = '';
                $status = '';
                if(\Helper::teamMemberProjects(auth()->user()->id)){
                    $all = \Helper::teamMemberProjects(auth()->user()->id)->get();
                }else{
                    $all = [];
                }

                if(\Helper::teamMemberProjects(auth()->user()->id)){
                    $projects = \Helper::teamMemberProjects(auth()->user()->id)->paginate(20);
                }else{
                    $projects = [];
                }
                
                return view('projects.index', compact('projects', 'all', 'search', 'status'));
            }elseif(auth()->user()->isCustomer()){
                $customer = User::findOrFail(auth()->user()->id);
                return view('customers.show', compact('customer'));
            }
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
        //
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
        //
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
