@extends('layouts.master')

@section('title')
    All the tasks
@stop

@section('content')
    <div class='task'>
        @foreach($tasks as $task)
            <h1>{{ $task->title }}</h1>
            <h2>{{ $task->detail }}</h2>
        @endforeach
    </div>
@stop