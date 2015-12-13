@extends('layouts.master')

@section('title')
    Delete Task
@stop


@section('content')

        <div class="col-md-12">
    		<h1>Delete Task</h1>
    		<p>Are you sure you want to delete <em>{{$task->title}}</em>?</p>
    		<p><a href='/tasks/delete/{{$task->id}}'>Yes, Delete this task for good.</a></p>
    	</div>
@stop