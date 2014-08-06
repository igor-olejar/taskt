@extends('layouts.master')

@section('content')
<h1>Create new user</h1>
<p>
	{{ Form::open(array('role' => 'form', 'class' => 'form-signup', 'route' => 'user.save')) }}
            <div class="form-group">
                {{ Form::label('username', 'Username*') }}
                {{ Form::text('username', '', array('class' => 'form-control')) }}
                {{ $errors->first('username', '<span class="form-error">:message</span>') }}
            </div>

            <div class="form-group">
                {{ Form::label('firstname', 'First Name*') }}
                {{ Form::text('firstname', '', array('class' => 'form-control')) }}
                {{ $errors->first('firstname', '<span class="form-error">:message</span>') }}
            </div>

            <div class="form-group">
                {{ Form::label('lastname', 'Last Name') }}
                {{ Form::text('lastname', '', array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', 'Email*') }}
                {{ Form::text('email', '', array('class' => 'form-control')) }}
                {{ $errors->first('email', '<span class="form-error">:message</span>') }}
            </div>

            <div class="form-group">
                {{ Form::label('company', 'Company') }}
                {{ Form::text('company', '', array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('password', 'Password*') }}
                {{ Form::password('password', array('class' => 'form-control')) }}
                {{ $errors->first('password', '<span class="form-error">:message</span>') }}
            </div>

            <div class="form-group">
                {{ Form::label('password_repeat', 'Repeat Password*') }}
                {{ Form::password('password_repeat', array('class' => 'form-control')) }}
                {{ $errors->first('password_repeat', '<span class="form-error">:message</span>') }}
            </div>

            <div class="form-group">
                {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                <?php 
                    echo link_to('/', 'Cancel', array('class' => 'btn btn-primary'));
                ?>
            </div>
	{{ Form::close() }}
</p>
@stop
