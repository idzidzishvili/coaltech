@extends('template')

@section('content')
   <div class="container-fluid">
      <div class="row py-3">
         <div class="col-12 d-flex justify-content-between">
            <h2 class="m-0">View tasks by project</h2>         
         </div>
      </div>
      <div class="row py-3">
         <div class="col-12 d-flex">
            {{-- <label class="mx-2">Select project to view tasks</label> --}}
            <select id="projects" >
               @foreach ($projects as $project)
                  <option value="{{$project->id}}">{{$project->name}}</option>
               @endforeach
            </select>         
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="table-responsive">
               <table class="table table-sm m-0">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Task name</th>
                        <th>Create date</th>
                     </tr>
                  </thead>
                  <tbody id="tasks">
                     @foreach ($tasks as $i=>$task)
                        <tr>
                           <td>{{$i+1}}</td>
                           <td>{{$task->name}}</td>
                           <td>{{$task->created_at}}</td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
@endsection
