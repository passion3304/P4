@extends('layouts.master')

@section('title')
    My Tasks
@stop

@section('content')
    <div class='Main'>
        @if(Auth::check())
    	<ul class="nav nav-tabs" id="sort-tabs">
            <li class="nav active"><a href="#A" data-toggle="tab">All My Tasks</a></li>
            <li class="nav"><a href="#B" data-toggle="tab">Not Started</a></li>
            <li class="nav"><a href="#C" data-toggle="tab">In Progress</a></li>
            <li class="nav"><a href="#D" data-toggle="tab">Completed</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="A">
                @if(sizeof($tasks) ==0)
                    <p class="padding-top">You have not entered any tasks yet, <a href='/tasks/create'>want to add one?</a></p>
                @else
                    @foreach($tasks as $task)
                        <div class="row">
                            <div class="col-md-8">
                                <h2>{{ $task->title }}</h2>
                                <p>{{ $task->detail }}</p>
                                <p>{{ $task->status }}</p>
                                <p>Assigned to {{ $task->owner->first_name }}</p>
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
                @endif
            </div>
            <div class="tab-pane fade" id="B">
                @foreach($notStartedTasks as $task)
                    <div class="row">
                        <div class="col-md-8">
                            <h2>{{ $task->title }}</h2>
                            <p>{{ $task->detail }}</p>
                            <p>{{ $task->status }}</p>
                            <p>Assigned to {{ $task->owner->first_name }}</p>
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
            </div>
            <div class="tab-pane fade" id="C">
                @foreach($inProgressTasks as $task)
                    <div class="row">
                        <div class="col-md-8">
                            <h2>{{ $task->title }}</h2>
                            <p>{{ $task->detail }}</p>
                            <p>{{ $task->status }}</p>
                            <p>Assigned to {{ $task->owner->first_name }}</p>
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
            </div>
            <div class="tab-pane fade" id="D">
                @foreach($completedTasks as $task)
                    <div class="row">
                        <div class="col-md-8">
                            <h2>{{ $task->title }}</h2>
                            <p>{{ $task->detail }}</p>
                            <p>{{ $task->status }}</p>
                            <p>Assigned to {{ $task->owner->first_name }}</p>
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
            </div>
        </div>
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