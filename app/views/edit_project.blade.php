@extends('layouts.master')

@section('content')
    @if (Session::get('msg_errors'))
        <p class="bg-danger contextual">
            {{ Session::get('msg_errors') }}
        </p>
    @endif
    
    <p>
        {{ link_to_route('projects', 'List of projects') }}
    </p>

    <h1>Editing {{ $project->name }}</h1>
    @include('project_form')
@stop