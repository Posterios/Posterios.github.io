<?php

namespace App\Http\Controllers;

use App\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function projectPost(Request $request){

        $this->validate($request,[
            'project_title' => 'required|min:6|max:20',
            'project_category' => 'required',
            'project_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'project_video' => 'max:10240'
        ]);

        $project = new Projects();
        $project->user_id = $request->user_id;
        $project->username = $request->username;
        $project->gender = $request->gender;
        $project->project_title = $request->project_title;
        $project->project_category = $request->project_category;

        $path = $request->file('project_image')->store('images/project','public');
        $project->project_image = $path;

        $project->project_description = $request->project_description;
        $project->project_link = $request->project_link;

        if($request->file('project_video') == null){
            $project->project_video = null;
        } else {
            $path = $request->file('project_video')->store('videos/project','public');
            $project->project_video = $path;
        }

        $project->save();

        return redirect(url('/'));
    }


    public function myProjects() {
        $projects = DB::table('projects')
                ->where('user_id', '=', Auth::user()->id)
                ->paginate(10);
        return view('myprojects', ['projects' => $projects]);
    }

    public function getProjectID ($id){
        $projects = DB::table('projects')
                    ->where('id','=', $id)
                    ->get();

        return view('projectDetail', compact('projects'));
    }

    public function editProject(Request $request){

        $projects = Projects::where('id', '=', $request->id)->first();

        $projects->project_title = $request->project_title;
        $projects->project_category = $request->project_category;
        $projects->project_link = $request->project_link;

        if ($request->hasFile('project_image')) {
            $path = 'storage/images/project'.$projects->project_image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('project_image');
            $path = $file->store('images/project','public');
            $file->move('storage/images/project', $path);
            $projects->project_image = $path;
        }

        $projects->project_description = $request->project_description;

        if ($request->hasFile('project_video')) {
            $path = 'storage/videos/project'.$projects->project_video;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('project_video');
            $path = $file->store('videos/project','public');
            $file->move('storage/videos/project', $path);
            $projects->project_video = $path;
        }

        $projects->save();
        return redirect('/projectDetail/'.$projects->id);
    }


}
