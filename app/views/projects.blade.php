@extends('layouts.master')

@section('content')
    @if (Session::get('msg'))
    <p class="bg-info contextual">
        {{ Session::get('msg') }}
    </p>
    @endif
    
    <h1>Projects</h1>
    <p>
        <a href="projects/add" class="btn btn-default">Add Project</a>
    </p>
    
    @if (count($projects) === 0)
        <p class="bg-info contextual">No projects available. Please add.</p>
    @else
        <p>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Project</th>
                        <th>Customer</th>
                        <th colspan="2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($projects as $project)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $project->name }} (<a href="tasks?project={{ $project->id }}">Tasks</a>)</td>
                        <td>{{ $project->client->name }}</td>
                        <td>
                            @if (strtotime($project->end_date) < time())
                                Closed
                            @else
                                Open
                            @endif
                        </td>
                        <td>
                            <a href="projects/{{ $project->id }}/edit">Edit</a> / 
                            <a href="projects/{{ $project->id }}/delete" class="delete-link">Delete</a>
                        </td>
                        <?php $i++; ?>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </p>
    @endif
@stop