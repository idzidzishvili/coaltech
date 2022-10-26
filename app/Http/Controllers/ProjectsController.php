<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectsRequest;
use App\Models\Task;

class ProjectsController extends Controller
{

   public function index()
   {
      $projects = Project::all();
      return view('projects', ['projects' => $projects]);
   }


   public function create()
   {
      $project = new Project();
      $tasks = Task::all();
      return view('add', ['resource' => 'projects', 'project' => $project, 'tasks' => $tasks, 'selectedTasks' => []]);
   }


   public function store(ProjectsRequest $request)
   {
      $project = Project::create([
         'name' => $request->name,
      ]);
      $project->task()->attach($request->tasks);
      return redirect()->route('projects.index');
   }


   public function show($id)
   {
   }


   public function edit($id)
   {
      $project = Project::findOrFail($id);
      $tasks = Task::all();
      $selectedTasks = $project->task->pluck('id')->toArray();
      return view('edit', ['resource' => 'projects', 'project' => $project, 'tasks' => $tasks, 'selectedTasks' => $selectedTasks, 'id' => $id]);
   }


   public function update(ProjectsRequest $request, $id)
   {
      $project = Project::findOrFail($id);
      $project->update([
         'name' => $request->name
      ]);
      $project->task()->sync($request->tasks);
      return redirect()->route('projects.index');
   }


   public function destroy($id)
   {
      Project::findOrFail($id)->delete();
      return redirect()->route('projects.index');
   }


   public function vewTasks(){
      $projects = Project::all();
      $tasks = null;
      if(count($projects)){
         $tasksArray = $projects[0]->task->pluck('id')->toArray();
         $tasks = Task::whereIn('id', $tasksArray)->get();
      }
      return view('tasks-by-project', ['projects' => $projects, 'tasks' => $tasks]);
   }
}
