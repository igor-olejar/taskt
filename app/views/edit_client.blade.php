@extends('layouts.master')

@section('content')
    @if (Session::get('msg_errors'))
        <p class="bg-danger contextual">
            {{ Session::get('msg_errors') }}
        </p>
    @endif
    
    <p>
        {{ link_to_route('clients', 'List of clients') }}
    </p>

    <h1>Editing {{ $client->name }}</h1>
    @include('client_form')
@stop