@extends('layouts.master')
{{ HTML::style('css/signin.css') }}

@section('content')
    {{ Form::open(array('url' => 'login', 'class' => 'form-signin', 'role' => 'form')) }}
    <h2 class="form-signin-heading">Login</h2>
    <p class="text-danger">
        {{ $errors->first('username') }}<br />
        {{ $errors->first('password') }}
    </p>
    
    <p>
        {{ Form::text('username', Input::old('username'), array('placeholder' => 'Username', 'class' => 'form-control')) }}
    </p>
    
    <p>
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
    </p>
    
    <p>
        {{ Form::submit('Log in', array('class' => 'btn btn-lg btn-default btn-block')) }}
    </p>
    {{ Form::close() }}
@stop