@extends('layouts.master')

@section('content')
<h1>Editing {{ $project->name }}</h1>
<p>
    {{ Form::model($project, array('role' => 'form', 'route' => array('project.update', $project->id))) }}
        <div class="form-group">
            {{ Form::label('name', 'Project Name') }}
            {{ Form::text('name', $project->name, array('class' => 'form-control', 'id' => 'project-name')) }}
        </div>
    {{ Form::close() }}
</p>
@stop