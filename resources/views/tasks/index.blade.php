@extends('layouts.master')

@section('title')
    All the tasks
@stop

@section('content')
    <div class='task'>
        @foreach($tasks as $task)
            <h2>{{ $task->title }}</h2>
            <p>{{ $task->detail }}</p>
        @endforeach
    </div>
@stop