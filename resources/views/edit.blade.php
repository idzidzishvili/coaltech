@extends('template')

@section('content')

   <div class="container-fluid">
      <div class="row py-3">
         <div class="col-12">
            <h2 class="m-0"> {{'Edit '.$resource}}</h2>
         </div>
      </div>

      <div class="row">
         <div class="col-12">
            <form class="form-horizontal" method="POST" action="{{route($resource.'.update', $id)}}">
               @csrf 
               @method('patch')

               @include('forms.'.$resource)

               <div class="form-group row pt-3">
                  <div class="offset-sm-2 col-sm-10">
                     <button type="submit" class="btn btn-success px-4">Save</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>

@endsection