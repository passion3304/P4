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

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <div class='form-group'>
            <label>* Title:</label>
            <input
                type='text'
                id='title'
                name='title'
                value='{{ old('title','Mow the Lawn') }}'
            >
        </div>

        <div class='form-group'>
            <label for='detail'>* Detail:</label>
            <input
                type='text'
                id='detail'
                name='detail'
                value='{{ old('detail','Backyard mowing') }}'
            >
            </select>
        </div>

        <div class='form-group'>
            <label for='status'>* Status:</label>
            <input
                type='text'
                id='status'
                name="status"
                value='{{ old('status','Not Started') }}'
                >
        </div>

        <div class='form-group'>
            <label for='owner'>Owner:</label>
            <input
                type='text'
                id='owner'
                name="owner"
                value='{{ old('owner','Brendan') }}'
                >
        </div>

        <button type="submit" class="btn btn-primary">Add task</button>
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