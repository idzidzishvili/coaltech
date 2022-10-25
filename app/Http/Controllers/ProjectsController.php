<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectsRequest;

class ProjectsController extends Controller
{

   public function index()
   {
      $projects = Project::all();
      return view('projects', ['pro' => $projects]);
   }


   public function create()
   {
      $project = new Project();
      return view('add', ['action' => 'Add', 'resource' => 'projects', 'project' => $project]);
   }


   public function store(ProjectsRequest $request)
   {
      Project::create([
         'name' => $request->name,
      ]);
      return redirect()->route('projects.index');
   }


   public function show($id)
   {
   }


   public function edit($id)
   {
      $task = Project::findOrFail($id);
      return view('edit', ['action' => 'Edit', 'resource' => 'projects', 'project' => $task, 'id' => $id]);
   }


   public function update(ProjectsRequest $request, $id)
   {
      Project::findOrFail($id)->update([
         'name' => $request->name
      ]);
      return redirect()->route('projects.index');
   }


   public function destroy($id)
   {
      Project::findOrFail($id)->delete();
      return redirect()->route('projects.index');
   }
}
