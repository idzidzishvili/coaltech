<div class="form-group row">
   <label for="name" class="col-sm-2 col-form-label">Task name</label>
   <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" placeholder="Task name" value="{{$task->name}}">
      <small class="text-danger">{{ $errors->first('name') }}</small>
   </div>
</div>