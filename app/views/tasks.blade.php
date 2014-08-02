@extends('layouts.master')

@section('content')
    @if (Session::get('msg'))
    <p class="bg-info contextual">
        {{ Session::get('msg') }}
    </p>
    @endif
    
    <h1>Tasks</h1>
    <p>
        <a href="tasks/add" class="btn btn-default">Add Task</a>
    </p>
    
    @if (count($tasks) === 0)
        <p class="bg-info contextual">No tasks available. Please add.</p>
    @else
        <p>
            <strong>Filter by:</strong>
<!--            Client-->
            <?php
//                $options = array(0 => 'Select');
//                foreach ($clients as $client) {
//                    $options[$client->id] = $client->name;
//                } unset($client);
//                
//                echo Form::select('client_id', $options, Input::get("client"), array('type' => 'client', 'class' => 'form-control short-menu filter', 'id' => 'task-client-filter'));
            ?>
            &nbsp;Project
            <?php
                $options = array(0 => 'Select');
                foreach ($projects as $project) {
                    $options[$project->id] = $project->name;
                } unset($project);
                
                echo Form::select('project_id', $options, Input::get("project"), array('type' => 'project', 'class' => 'form-control short-menu filter', 'id' => 'task-project-filter'));
            ?>
            &nbsp;Status
            <?php
                $options = array(
                    0               => 'Select',
                    'todo'         => 'To do',
                    'in progress'   => 'In progess',
                    'completed'     => 'Completed'
                );
                
                echo Form::select('status_id', $options, Input::get("status"), array('type' => 'status', 'class' => 'form-control short-menu filter', 'id' => 'task-status-filter'));
            ?>
            {{ Form::button('Clear Filters', array('id'=>'clear-filters', 'class'=>'btn btn-default')) }}
        </p>
        <p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Task ID</th>
                        <th>Description</th>
                        <th>Project</th>
                        <th>Client</th>
                        <th colspan="2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->project->name }}</td>
                        <td>{{ $task->project->client->name }}</td>
                        <td>{{ $task->status }}</td>
                        <td>
                            <a href="tasks/{{ $task->id }}/edit">Edit</a> / 
                            <a href="tasks/{{ $task->id }}/delete" class="delete-link">Delete</a> 
                            @if ($task->status != 'completed')
                            Action: 
                            <span id="task_{{ $task->id }}" class="glyphicon glyphicon-play" task_id="{{ $task->id }}" checkin_id=""></span>
                            <span id="task_stop_{{ $task->id }}" class="glyphicon glyphicon-stop"></span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </p>
        <p>
            {{ $tasks->links() }}
        </p>
    @endif
@stop