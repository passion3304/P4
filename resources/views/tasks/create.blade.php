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

   

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    {{-- <script src="/js/tasks/create.js"></script> --}}
@stop