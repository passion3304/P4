@extends('layouts.master')

@section('title')
    Edit task
@stop


@section('content')

<h1>Edit: {{$task->title}}</h1>
    <form method='POST' action='/tasks/edit'>
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
          <input class='form-control' type='text' id='status' name='status' value='{{$task->status}}'>
       </fieldset>
       <fieldset class='form-group'>
          <label for='owner'>Owner:</label>
          <input class='form-control' type='text' id='owner' name='owner' value='{{$task->owner}}'>
       </fieldset>
       <button type='submit' class="btn btn-primary btn-lg active" role="button">Save changes</button>
    </form>

@stop