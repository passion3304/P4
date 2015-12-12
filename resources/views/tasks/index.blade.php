@extends('layouts.master')

@section('title')
    All the tasks
@stop

@section('content')
    <div class='Main'>
        @foreach($tasks as $task)
        	<div class="row">
        		<div class="col-md-8">
            		<h2>{{ $task->title }}</h2>
            		<p>{{ $task->detail }}</p>
            		<p>{{ $task->status }}</p>
            	</div>  
            	<div class="col-md-4">	
            		<ul class="nav nav-pills" id="edit">
            			<li role="presentation"><a href='/tasks/edit/{{ $task->id }}'> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>    Edit</a></li>
            		</ul>
            	</div>
            </div>
        @endforeach
    </div>
@stop