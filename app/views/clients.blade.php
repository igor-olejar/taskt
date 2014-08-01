@extends('layouts.master')

@section('content')
    @if (Session::get('msg'))
    <p class="bg-info contextual">
        {{ Session::get('msg') }}
    </p>
    @endif
    
    <h1>Clients</h1>
    <p>
        <a href="clients/add" class="btn btn-default">Add Client</a>
    </p>
    
    @if (count($clients) === 0)
        <p class="bg-info contextual">No clients available. Please add.</p>
    @else
        <p>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Client</th>
                        <th>Description</th>
                        <th colspan="2">Website</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($clients as $client)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $client->name }} (<a href="projects?client={{ $client->id }}">Projects</a>)</td>
                        <td>{{ $client->description }}</td>
                        <td><a href="{{ url($client->website) }}" target="_blank">{{ $client->website }}</a></td>
                        <td>
                            <a href="clients/{{ $client->id }}/edit">Edit</a> / 
                            <a href="clients/{{ $client->id }}/delete" class="delete-link">Delete</a>
                        </td>
                        <?php $i++; ?>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </p>
    @endif
@stop