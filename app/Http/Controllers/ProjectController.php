<?php

namespace App\Http\Controllers;

use App\Projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function projectPost(Request $request){

        $this->validate($request,[
            'project_title' => 'required|min:3|max:10',
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

        return redirect(url('/post'));
    }
}