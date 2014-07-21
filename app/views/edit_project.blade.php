@extends('layouts.master')

@section('content')
    @if (Session::get('msg_errors'))
        <p class="bg-danger contextual">
            {{ Session::get('msg_errors') }}
        </p>
    @endif

    <h1>Editing {{ $project->name }}</h1>
    @include('project_form')
@stop