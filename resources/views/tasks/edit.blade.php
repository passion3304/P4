@extends('layouts.master')

@section('title')
    Edit task
@stop


@section('content')
<script src='/js/form.js'></script>
<div class="col-md-10">
  <h1>Edit: {{$task->title}}</h1>
      <form name='saveForm' method='POST' action='/tasks/edit'>
         <input type='hidden' value='{{ csrf_token() }}' name='_token'>
         <input type='hidden' name='id' value='{{ $task->id }}'>
         <input type='hidden' value='{{ csrf_token() }}' name='_token'>
         <fieldset class='form-group'>
            <label for='title'>* Title:</label>
            <input class='form-control' type='text' id='title' name='title' value='{{$task->title}}'>
         </fieldset>
         <fieldset class='form-group'>
            <label for='detail'>* Details:</label>
            <textarea class='form-control' rows='3' type='text' id='detail' name='detail'> {{$task->detail}}</textarea>
         </fieldset>
         <fieldset class='form-group'>
            <label for='status'>* Status:</label>
            <select class='form-control' id='status' name='status'>
              <option value='Not Started'>Not Started</option>
              <option value='In Progress'>In Progress</option>
              <option value='Completed'>Completed</option>
            </select>
         </fieldset>
         <fieldset class='form-group'>
            <label for='owner'>Assigned to:</label>
            <select name='owner_id' id='owner_id'>
            @foreach($owners_for_dropdown as $owner_id => $owner_name)
              <option value='{{ $owner_id }}'> {{ $owner_name }} </option>
             @endforeach
            </select>
         </fieldset>
         
         <ul class='nav nav-pills'>
          <li><a href='javascript: submitform()'><span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'></span>    Save changes</a></a></li>
          <li>
         <a class='trash' href='/tasks/confirm-delete/{{$task->id}}'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>    Delete task</a></li>
       </ul>
      </form>
  </div>

@stop