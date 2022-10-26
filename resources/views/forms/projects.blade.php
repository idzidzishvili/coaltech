<div class="form-group row mb-3">
   <label for="name" class="col-sm-2 col-form-label">Project name</label>
   <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" placeholder="Project name" value="{{$project->name}}">
      <small class="text-danger">{{ $errors->first('name') }}</small>
   </div>
</div>

<div class="form-group row">
   <label for="tasks" class="col-sm-2 col-form-label">Attach task</label>
   <div class="col-sm-10">
      <select class="form-control multiselect w-100" id="tasks" name="tasks[]" multiple="multiple">
         @foreach ($tasks as $task)
            <option value="{{$task->id}}" {{ in_array($task->id, $selectedTasks) ? 'selected' : '' }}>{{$task->name}}</option>
         @endforeach
      </select>
      <small class="text-danger">{{ $errors->first('tasks') }}</small>
   </div>
</div>