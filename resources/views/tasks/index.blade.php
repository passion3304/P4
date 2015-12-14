@extends('layouts.master')

@section('title')
    My Tasks
@stop

@section('content')
    <div class='Main'>
        @if(Auth::check())
    	<ul class="nav nav-tabs" id="sort-tabs">
            <li class="active"><a href="#">All My Tasks</a></li>
            <li><a href="#">Not Started</a></li>
            <li><a href="#">In Progress</a></li>
            <li><a href="#">Completed</a></li>
        </ul>
        @foreach($tasks as $task)
        	<div class="row">
        		<div class="col-md-8">
            		<h2>{{ $task->title }}</h2>
            		<p>{{ $task->detail }}</p>
            		<p>{{ $task->status }}</p>
            	</div>  
            	<div class="col-md-4">
                    <p class="created right">Created: {{ $task->created_at }}</p>
            		<ul class="nav nav-pills right" id="edit">
            			<li role="presentation"><a href='/tasks/edit/{{ $task->id }}'> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>    Edit task</a></li>
            		</ul>
            	</div>
            </div>
            <hr>
        @endforeach
        @else
            <div class="row">
                <div class="col-md-10">
                    <h2>Welcome to TaskMaster!</h2>
                    <p>TaskMaster is task tracking software designed to keep track of <em>all</em> your important tasks.</p>
                    <p>To get started <a href="/register">create</a> an account.</p>
                    <p>Or <a href="/login">login</a> if you already set one up.</p>
                </div>
            </div>
        @endif
    </div>
@stop