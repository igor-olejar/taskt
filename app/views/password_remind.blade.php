@extends('layouts.master')

@section('content')
    <h1>Password Reminder</h1>
    <p>Please enter your password below. A password reminder will be sent to you.</p>
    <p>
        <form action="{{ action('RemindersController@postRemind') }}" method="POST">
            <div class="form-group">
                {{ Form::label('email', 'Email*') }}<br />
                <input type="email" name="email" class="form-control">
                {{ $errors->first('username', '<span class="form-error">:message</span>') }}
            </div>
            <input type="submit" value="Send Reminder" class="btn btn-primary">
        </form>
    </p>
@stop
