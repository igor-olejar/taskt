@extends('layouts.master')

@section('content')
    <h1>Track your time</h1>
    <p>
        <h3>
            Manage:
        </h3>
        <ul class="basic-list">
            <li><a href="projects">Projects</a></li>
            <li><a href="clients">Clients</a></li>
            <li><a href="tasks">Tasks</a></li>
        </ul>
    </p>
    @if (count($tasks) !== 0)
        <p>
            <h3>5 most recent active tasks:</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Task ID</th>
                        <th>Description</th>
                        <th>Project</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td><a href="tasks/{{ $task->id }}/edit">{{ $task->id }}</a></td>
                        <td><a href="tasks/{{ $task->id }}/edit">{{ $task->description }}</a></td>
                        <td>{{ $task->project->name }}</td>
                        <td>{{ $task->status }}</td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </p>
    @endif
@stop