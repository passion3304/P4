@extends('layouts.master')

@section('content')
<div class="col-md-12">
    <p>Don't have an account? <a href='/register'>Register here...</a></p>

    <h1>Login</h1>

    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method='POST' action='/login'>
        {!! csrf_field() !!}
        <fieldset class='form-group'>
            <label for='email'>Email</label>
            <input type='text' class='form-control' name='email' id='email' value='{{ old('email') }}'>
        </fieldset>
        <fieldset class='form-group'>
            <label for='password'>Password</label>
            <input type='password' class='form-control' name='password' id='password' value='{{ old('password') }}'>
        </fieldset>
        <fieldset class='form-group'>
            <input type='checkbox' name='remember' id='remember'>
            <label for='remember' class='checkboxLabel'>Remember me</label>
        </fieldset>
        <button type='submit' class="btn btn-primary btn-lg active" role="button">Login</button>
    </form>
</div>
@stop