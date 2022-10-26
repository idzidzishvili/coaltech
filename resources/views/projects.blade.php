@extends('template')

@section('content')
   <div class="container-fluid">
      <div class="row py-3">
         <div class="col-12 d-flex justify-content-between">
            <h2 class="m-0">Projects</h2>         
            <div class="d-flex align-items-center">
               <a href="{{route('projects.create')}}"><div class="btn btn-sm btn-success"><i class="fa fa-plus mr-2"></i>Add project</div></a>
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
                        <th>Project name</th>
                        <th>Create date</th>
                        <th class="col-2">Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($projects as $i=>$project)
                        <tr>
                           <td>{{$i+1}}</td>
                           <td>{{$project->name}}</td>
                           <td>{{$project->created_at}}</td>
                           <td class="d-flex">
                              <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-info me-2">Edit</a>
                              <form method="post" action="{{ route('projects.destroy', $project->id) }}">
                                 @csrf @method('delete')
                                 <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                              </form>
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
