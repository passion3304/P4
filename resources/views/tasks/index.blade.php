@extends('layouts.master')

@section('title')
    All the tasks
@stop

@section('content')
    <div class='task'>
        @foreach($tasks as $task)
            <h2>{{ $task->title }}</h2>
            <img src='{{ $task->cover }}'>
        @endforeach
    </div>
@stop