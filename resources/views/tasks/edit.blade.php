@extends('layouts.master')

@section('title')
    Edit task
@stop


@section('content')

    <h1>Edit</h1>


    <form method='POST' action='/tasks/edit'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <input type='hidden' name='id' value='{{ $task->id }}'>

<input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <div class='form-group'>
            <label>* Title:</label>
            <input
                type='text'
                id='title'
                name='title'
                value='{{$task->title}}'
            >
        </div>

        <div class='form-group'>
            <label for='detail'>* Detail:</label>
            <input
                type='text'
                id='detail'
                name='detail'
                value='{{$task->detail}}'
            >
            </select>
        </div>

        <div class='form-group'>
            <label for='status'>* Status:</label>
            <input
                type='text'
                id='status'
                name="status"
                value='{{$task->status}}'
                >
        </div>

        <div class='form-group'>
            <label for='owner'>Owner:</label>
            <input
                type='text'
                id='owner'
                name="owner"
                value='{{$task->owner}}'
                >
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>

@stop