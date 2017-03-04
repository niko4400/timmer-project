<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Projects;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function updateTime($id) {
        $time=Input::get('time');
        $new = Projects::find($id);
        //$new->setTimeProject($time);
        $new->time=$time;
        $new->save(array('time',intValue($time)));

        $projects= Projects::where('user_id','=',\Auth::user()->id)->Orderby('id','desc')->get();

       return back()->withInput(['projects' => $projects,'main_project' =>$new]);
    }

    public function deleteProject($id) {
        $project=Projects::find($id);
        $project->delete();
        return back();
    }

    public function finishProject($id) {
        $project=Projects::find($id);
        $project->project_end=date('Y/m/d');
        $project->save(array('project_end',date('Y/m/d')));
        return back();
    }

    public function updateProject(Request $request) {
        $project=Projects::find($request['id']);
        $project->name=$request['name'];
        $project->technology=$request['technology'];
        if($request['checkEnd']== 'checked')
            $project->project_end=''.$request['yearEnd'].'/'.$request['monthEnd'].'/'.$request['dayEnd'];
        else
            $project->project_end=NULL;
        $project->deadline=''.$request['yearDeadline'].'/'.$request['monthDeadline'].'/'.$request['dayDeadline'];
        $project->description=''.$request['description'];
        $project->save();

        return back();

    }

    public function createProject(Request $request) {
        $project= new Projects();
        $project->name=''.$request['name'];
        $project->technology=''.$request['technology'];
        $project->user_id=$request['id'];
        $project->deadline=''.$request['year'].'/'.$request['month'].'/'.$request['day'];
        $project->description=''.$request['description'];
        $project->save();

        //compact($projects)
        return back();

    }

    public function index() {
        $projects= Projects::where('user_id','=',\Auth::user()->id)->Orderby('id','desc')->paginate(10);
        //compact($projects)
        return view('projects', ['projects' => $projects]);

    }
}
