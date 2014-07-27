@extends('layouts.master')

@section('content')
    @if (Session::get('msg_errors'))
        <p class="bg-danger contextual">
            {{ Session::get('msg_errors') }}
        </p>
    @endif
    
    <p>
        {{ link_to_route('tasks', 'List of tasks') }}
    </p>

    <h1>Editing {{ $task->id }}</h1>
    @include('task_form')
@stop