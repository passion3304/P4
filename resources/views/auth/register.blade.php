@extends('layouts.master')

@section('content')

    <p>Already have an account? <a href='/login'>Login here...</a></p>

    <h1>Register</h1>

    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method='POST' action='/register'>
        {!! csrf_field() !!}
        <fieldset class='form-group'>
            <label for='name'>Name</label>
            <input type='text' class='form-control' name='name' id='name' value='{{ old('name') }}'>
        </fieldset>
        <fieldset class='form-group'>
            <label for='email'>Email</label>
            <input type='text' class='form-control' name='email' id='email' value='{{ old('email') }}'>
        </fieldset>
        <fieldset class='form-group'>
            <label for='password'>Password</label>
            <input type='password' class='form-control' name='password' id='password'>
        </fieldset>
        <fieldset class='form-group'>
            <label for='password_confirmation'>Confirm Password</label>
            <input type='password' class='form-control' name='password_confirmation' id='password_confirmation'>
        </fieldset>
        <button type='submit' class='btn btn-primary'>Register</button>
    </form>

@stop