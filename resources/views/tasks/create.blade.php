@extends('layouts.master')

@section('title')
    Create task
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')
    {{-- <link href="/css/tasks/create.css" type='text/css' rel='stylesheet'> --}}
@stop



@section('content')
<h1>Add a new task</h1>
@include('errors')

    <form method='POST' action='/tasks/create'>
       <fieldset class='form-group'>
          <input type='hidden' value='{{ csrf_token() }}' name='_token'>
          <label for='title'>* Title:</label>
          <input type='text' class='form-control' id='title' name='title' value='{{ old('title','Mow the Lawn') }}'>
       </fieldset>
       <fieldset class='form-group'>
          <label for='detail'>* Details:</label>
          <textarea type='text' class='form-control' id='detail' name='detail' rows='3'>{{ old('detail','Backyard mowing') }}
          </textarea>
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
          <label for='owner'>Owner:</label>
          <input type='text' class='form-control' id='owner' name='owner' value='{{ old('owner','Brendan') }}'>
       </fieldset>
       <button type='submit' class="btn btn-primary btn-lg active" role="button">Add task</button>
    </form>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    {{-- <script src="/js/tasks/create.js"></script> --}}
@stop