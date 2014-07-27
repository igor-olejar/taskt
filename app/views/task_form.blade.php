<p>
    {{ Form::model($task, array('role' => 'form', 'route' => array($route, $task->id))) }}
        <div class="form-group">
            {{ Form::label('description', 'Description*') }}
            {{ Form::textarea('description', $task->description, array('class' => 'form-control', 'id' => 'task-description')) }}
            {{ $errors->first('description', '<span class="form-error">:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::label('project_id', 'Project') }}<br />
            <?php
                $options = array();
                foreach ($projects as $project) {
                    $options[$project->id] = $project->name;
                } unset($project);
                
                echo Form::select('project_id', $options, $task->project_id, array('class' => 'form-control', 'id' => 'task-project-id'));
            ?>
        </div>
        <div class="form-group">
            {{ Form::label('start_date', 'Start Date*') }}
            <?php $sd = ($task->start_date)? date('d/m/Y',strtotime($task->start_date)): ""; ?>
            {{ Form::text('start_date', $sd, array('class' => 'form-control datepicker', 'id' => 'date-start-date')) }}
            {{ $errors->first('start_date', '<span class="form-error">:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::label('end_date', 'End Date') }}
            <?php $ed = ($task->end_date)? date('d/m/Y',strtotime($task->end_date)): ""; ?>
            {{ Form::text('end_date', $ed, array('class' => 'form-control datepicker', 'id' => 'task-end-date')) }}
        </div>
        <div class="form-group">
            {{ Form::label('status', 'Status') }}
            <?php
                $options = array(
                    'in progress'   =>  'In progress',
                    'completed'     =>  'Completed',
                    'todo'          =>  'To do'
                );
                
                $default = ($task->status)? : 'todo';
                
                echo Form::select('status', $options, $default, array('class' => 'form-control', 'id' => 'task-status'));
            ?>
        </div>

        <div class="form-group">
            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
            <?php 
                echo link_to_route('tasks', 'Cancel', array(), array('class' => 'btn btn-primary'));
            ?>
        </div>
    {{ Form::close() }}
</p>