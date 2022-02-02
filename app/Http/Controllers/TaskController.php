<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function index_all($tasks= [], $main = '', $status = '', $expProject = '', $expTask = '')
    {   
        $all = Task::all();
        $tasks= $tasks;
        $main = $main;
        $search = '';
        $status = $status;
        $expProject = $expProject;
        $expTask= $expTask;
        if(auth()->user()->isAdmin()){
            return view('tasks.index', compact('tasks', 'all', 'search', 'status','expProject', 'expTask', 'main'));
        }else{
            return redirect()->back();
        }
    }

    public function index()
    {  
        $tasks = Task::where('trash', 0)->orderBy('updated_at', 'desc')->paginate(20);
        return $this->index_all($tasks);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');
        $tasks = Task::where('trash', 0)->where('id', '!=', null);
        if($request->has('status')){
            if(!empty($request->input('status') || $request->input('status') == 0)){
                if($request->input('status')  != 'all'){
                    $status= $request->input('status');
                    $tasks = $tasks->where('status', $status);
                }  
            }
        }
        if($request->has('search')){
            if(!empty($request->input('search'))){
                $tasks = $tasks->where('name', 'LIKE', "%".$search."%");
            }
        }

        $tasks = $tasks->orderBy('updated_at', 'desc')->paginate(20);
        $tasks->appends($request->all())->links();
        $data = array(
            'tasks' => $tasks,
            'search' => $search,
            'status' => $status
        );
        
        return view('tasks.index')->with($data);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = '';
        return view('tasks.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'name' => 'required',
            'team_members' => 'required',
            'project_id' => 'required',
            'docs' => 'nullable|mimes:pdf|max:5000',
        ]);

        

        if($request->has('duration')){
            $duration = explode('/', $request->input('duration'));
            $date = date_create_from_format('j-M-Y', "2021-08-25");
            $start_date = Carbon::createFromFormat('Y-m-d', str_replace(' ', '', $duration[0]));
            $end_date = Carbon::createFromFormat('Y-m-d', str_replace(' ', '', $duration[1]));
          if ($duration) {
            if ($duration[0]) {
                $input['start_at'] =  $duration[0];
            }
            if ($duration[1]) {
                $input['end_at'] = $duration[1] ;
            }
          }
        }

        if($request->has('team_members')){
            
            $input['team_members'] = json_encode($input['team_members']);
        }

        if($request->hasFile('docs')){
            $filenameWithExt = $request->file('docs')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('docs')->getClientOriginalExtension();
            $docs = $filename.'_'.time().'.'.$extension;
            $input['docs'] = $docs;
            $request->file('docs')->move(base_path('/uploads/files/tasks'), $docs);
        }
        
        Task::create($input);

        $project = Project::findOrFail($input['project_id']);
        $tasks = json_decode($project->tasks, true);
        $completed = [];
        foreach ($tasks as $key => $task) {
            if($task['status'] == 3){
                array_push($completed, $task['id']);
            }
        }
        
        $progress = round( (count($completed)/ count($tasks)) * 100) ;
        $project->progress = $progress;
        $project->save();

        return redirect()->back()->with('success', 'Task Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $all = Task::all();
        $tasks = Task::where('trash', 0)->orderBy('updated_at', 'desc')->paginate(20);
        $search ='';
        $status = '';
        $expProject = '';
        $expTask = Task::findOrFail($id);
        if(auth()->user()->isTeamMember()){
            if(count(\Helper::teamMembertasks(auth()->user()->id))){
                foreach (\Helper::teamMembertasks(auth()->user()->id) as $task){
                    if($task->id == $id){
                        if ($expTask ) {
                            return view('tasks.show', compact( 'tasks', 'all', 'search', 'status','expProject', 'expTask'));
                        }
                    }else{
                        return redirect()->back();
                    }
                }
            }else{
                return redirect()->back();
            }
        }else{
            if ($expTask ) {
                return view('tasks.show', compact( 'tasks', 'all', 'search', 'status','expProject', 'expTask'));
            }
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
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
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
        if($request->has('update-status')){
            dd($request->all());
        }else{
            $this->validate($request, [
                'name' => 'required',
                'team_members' => 'required',
                'project_id' => 'required',
                'docs' => 'nullable|mimes:pdf|max:5000',
            ]);
            $task = Task::findOrFail($id);
            $input = $request->all();
    
            if($request->has('duration')){
                $duration = explode('/', $request->input('duration'));
                $date = date_create_from_format('j-M-Y', "2021-08-25");
                $start_date = Carbon::createFromFormat('Y-m-d', str_replace(' ', '', $duration[0]));
                $end_date = Carbon::createFromFormat('Y-m-d', str_replace(' ', '', $duration[1]));
              if ($duration) {
                if ($duration[0]) {
                    $input['start_at'] =  $duration[0];
                }
                if ($duration[1]) {
                    $input['end_at'] = $duration[1] ;
                }
              }
            }
    
            if($request->hasFile('docs')){
                $filenameWithExt = $request->file('docs')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('docs')->getClientOriginalExtension();
                $docs = $filename.'_'.time().'.'.$extension;
                $input['docs'] = $docs;
                $request->file('docs')->move(base_path('/uploads/files/tasks'), $docs);
            }
    
            $task->update($input);
    
            $project = Project::findOrFail($input['project_id']);
            $tasks = json_decode($project->tasks, true);
            $completed = [];
            foreach ($tasks as $key => $task) {
                if($task['status'] == 3){
                    array_push($completed, $task['id']);
                }
            }
    
            $progress = round( (count($completed)/ count($tasks)) * 100) ;
            $project->progress = $progress;
            $project->save();
    
            return redirect()->back()->with('success', 'Task Updated');
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
        
        $task = Task::findOrFail($id);
        $task->delete();
    }

    public function status($status)
    {
        if(auth()->user()->isAdmin() || auth()->user()->isPM() ){
            $status = $status;
            $tasks = Task::where('trash', 0)->where('id', '!=', null);
            
            if($status || $status == 0){
                $tasks = $tasks->where('status', $status);
            }  
            $tasks = $tasks->get();

            return $this->index_all($tasks, null, $status);
        }
        
    }

    public function trash()
    {
        if(auth()->user()->isAdmin() || auth()->user()->isPM() ){
            $tasks = Task::where('trash', 1)->orderBy('updated_at', 'desc')->get();

            if(auth()->user()->isAdmin()){
                return $this->index_all($tasks, 2);
            }else{
                return redirect()->back();
            }
        }
    }

    public function marked()
    {
        if(auth()->user()->isAdmin() || auth()->user()->isPM() ){
            $tasks = Task::where('marked', 1)->orderBy('updated_at', 'desc')->get();

            if(auth()->user()->isAdmin()){
                return $this->index_all($tasks, 1);
            }else{
                return redirect()->back();
            }
        }
    }


    public function project_tasks($id)
    {
        if(auth()->user()->isAdmin() || auth()->user()->isPM() ){
            $project = Project::findOrFail($id);
            if(count($project->tasks)){
                $tasks = $project->tasks;
                return $this->index_all($tasks, '', '', $project);
            }else{
                return view('projects.show', compact('project'));
            }
        }
    }
}
