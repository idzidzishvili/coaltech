<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Task;

class AjaxController extends Controller
{
    public function reorderTasks(Request $request){
        for($i=0; $i<count($request->priority); $i++)
            if($request->priority[$i]) 
                Task::findOrFail($i)->update(['priority' => $request->priority[$i]]);
        return response()->json(['status' => 'success'], 200);
    }

    public function getTasks(Request $request){
        $project = Project::findOrFail($request->projectid);
        $tasksArray = $project->task->pluck('id')->toArray();
        $tasks = Task::whereIn('id', $tasksArray)->get();
        return response()->json(['status' => 'success', 'tasks' => $tasks], 200);
    }
}
