<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use Carbon\Carbon;
use App\HTTP\Requests\projectRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isTeamMember() || auth()->user()->isAdmin()){
            $all = Project::all();
            $projects = Project::orderBy('updated_at', 'desc')->paginate(20);
            $search = '';
            $status = '';
            if(auth()->user()->isTeamMember()){
                $all = \Helper::teamMemberProjects(auth()->user()->id)->get();
                $projects = \Helper::teamMemberProjects(auth()->user()->id)->paginate(20);
            }
            return view('projects.index', compact('projects', 'all', 'search', 'status'));
        }else{
            return redirect()->back();
        }
    }


    public function search(Request $request)
    {
        if(auth()->user()->isAdmin() || auth()->user()->isPM()){
            $search = $request->input('search');
            $status = $request->input('status');
            $projects = Project::where('id', '!=', null);
    
            if($request->has('status')){
                if(!empty($request->input('status') || $request->input('status') == 0)){
                    if($request->input('status')  != 'all'){
                        $status= $request->input('status');
                        $projects = $projects->where('status', $status);
                    }  
                }
            }
    
            if($request->has('search')){
                if(!empty($request->input('search'))){
                    $projects = $projects->where('name', 'LIKE', "%".$search."%");
                }
            }
            $projects = $projects->orderBy('updated_at', 'desc')->paginate(20);
            
            $projects->appends($request->all())->links();
            $data = array(
                'projects' => $projects,
                'search' => $search,
                'status' => $status
            );
            
            return view('projects.index')->with($data);
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
        return view('projects.create');
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
            'avatar' => 'image|nullable|max:1999',
            'duration' => 'required',
        ]);
        
        $input = $request->all();
        
        if($request->has('duration')){
            $duration = explode('/', $request->input('duration'));
            $date = date_create_from_format('j-M-Y', "2021-08-25");
            $start_date = Carbon::createFromFormat('Y-m-d', str_replace(' ', '', $duration[0]));
            $end_date = Carbon::createFromFormat('Y-m-d', str_replace(' ', '', $duration[1]));
          if ($duration) {
            if ($duration[0]) {
                $input['start_date'] =  $duration[0];
                
            }
            if ($duration[1]) {
                $input['end_date'] = $duration[1] ;
               
            }
          }
        }

        if($request->has('services')){
            $input['services'] = json_encode($input['services']);
        }

        if($request->has('technologies')){
            $input['technologies'] = json_encode($input['technologies']);
        }
        
        if($request->hasFile('avatar')){
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $avatar = $filename.'_'.time().'.'.$extension;
            $input['avatar'] = $avatar;
            $request->file('avatar')->move(base_path('/uploads/images/logos/projects'), $avatar);
        }
        Project::create($input);
        return redirect()->back()->with('success', 'Project Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);

        if(auth()->user()->isAdmin() || auth()->user()->isTeamMember() || auth()->user()->isPM()){
            if(auth()->user()->isTeamMember()){
                if(count(\Helper::teamMemberProjects(auth()->user()->id)->get())){
                    foreach (\Helper::teamMemberProjects(auth()->user()->id)->get() as $project){
                        if($project->id == $id){
                            return view('projects.show', compact('project'));
                        }else{
                            return redirect()->back();
                        }
                    }
                }else{
                    return redirect()->back();
                }
            }else{
                return view('projects.show', compact('project'));
            }
        }elseif(auth()->user()->isCustomer()){
            if(auth()->user()->isMyProject($id) ){
                return view('projects.show', compact('project'));
            }else{
                abort(404);
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
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
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
        if($request->has('kanban_tasks_status')){

            // dd($request->all());
            
            if(!empty($request->input('pending'))){
                foreach( explode(',', $request->input('pending')) as $task_id){
                    $task = Task::find($task_id);
                    $task->status = 0;
                    $task->save();
                }
            }
            if(!empty($request->input('progress'))){
                
                foreach( explode(',', $request->input('progress')) as $task_id){
                    $task = Task::find($task_id);
                    $task->status = 1;
                    $task->save();
                }
            }
            if(!empty($request->input('waiting'))){
                foreach( explode(',', $request->input('waiting')) as $task_id){
                    $task = Task::find($task_id);
                    $task->status = 2;
                    $task->save();
                }
            }
            if(!empty($request->input('completed'))){
                foreach( explode(',', $request->input('completed')) as $task_id){
                    $task = Task::find($task_id);
                    $task->status = 3;
                    $task->save();
                }
            }

            // return redirect()->back();
            // $project = Project::findOrFail($id);
            // $project->status = 4;
            // $project->save();
            // return redirect()->back()->with('success', 'Project Canceled');
        }elseif($request->has('cancel-from-show')){
            $project = Project::findOrFail($id);
            $project->status = 4;
            $project->save();
            return redirect()->back()->with('success', 'Project Canceled');
        }elseif($request->has('update-manager')){
            $project = Project::findOrFail($id);
            $project->manager_id = $request->input('manager_id');
            $project->save();
            return redirect()->back()->with('success', 'Project Manager Updated');
        }else{

        
            $this->validate($request, [
                'name' => 'required',
                'docs' => 'nullable|mimes:pdf|max:5000',
                'avatar' => 'image|nullable|max:1999',
                'duration' => 'required',
                'user_id' => 'required',
            ]);
            $project = Project::findOrFail($id);
            $input = $request->all();
            

            if($request->has('duration')){
                $duration = explode('/', $request->input('duration'));
                $date = date_create_from_format('j-M-Y', "2021-08-25");
                $start_date = Carbon::createFromFormat('Y-m-d', str_replace(' ', '', $duration[0]));
                $end_date = Carbon::createFromFormat('Y-m-d', str_replace(' ', '', $duration[1]));
            if ($duration) {
                if ($duration[0]) {
                    $input['start_date'] =  $duration[0];
                }
                if ($duration[1]) {
                    $input['end_date'] = $duration[1] ;
                }
            }
            }

            if($request->has('services')){
                $input['services'] = json_encode($input['services']);
            }

            if($request->has('technologies')){
                $input['technologies'] = json_encode($input['technologies']);
            }
            
            if($request->hasFile('avatar')){
                $filenameWithExt = $request->file('avatar')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('avatar')->getClientOriginalExtension();
                $avatar = $filename.'_'.time().'.'.$extension;
                $input['avatar'] = $avatar;
                $request->file('avatar')->move(base_path('/uploads/images/logos/projects'), $avatar);
            }
            $project->update($input);
            return redirect()->back()->with('success', 'Project Updated');
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
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->to('/projects')->with('success', 'Project deleted');
    }

    
}
