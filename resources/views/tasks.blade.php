@extends('template')

@section('content')
   <div class="container-fluid">
      <div class="row py-3">
         <div class="col-12 d-flex justify-content-between">
            <h2 class="m-0">Tasks</h2>         
            <div class="d-flex align-items-center">
               <a href="{{route('tasks.create')}}"><div class="btn btn-sm btn-success"><i class="fa fa-plus mr-2"></i>Add task</div></a>
            </div>
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
                        <th class="col-2">Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($tasks as $i=>$task)
                        <tr>
                           <td>{{$i+1}}</td>
                           <td>{{$task->name}}</td>
                           <td>{{$task->created_at}}</td>
                           <td class="d-flex">
                              <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-info me-2">Edit</a>
                              <form method="post" action="{{ route('tasks.destroy', $task->id) }}">
                                 @csrf @method('delete')
                                 <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                              </form>
                              {{-- <a href="#" data-toggle="modal" data-target="#deleteModal" data-id="{{$feature->id}}" data-resource="{{$resource}}">
                                 <i class="fas fa-trash text-danger"></i>
                              </a> --}}
                           </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
@endsection
