<p>
    {{ Form::model($project, array('role' => 'form', 'route' => array('project.update', $project->id))) }}
        <div class="form-group">
            {{ Form::label('name', 'Project Name*') }}
            {{ Form::text('name', $project->name, array('class' => 'form-control', 'id' => 'project-name')) }}
            {{ $errors->first('name', '<span class="form-error">:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', $project->description, array('class' => 'form-control', 'id' => 'project-description')) }}
        </div>
        <div class="form-group">
            {{ Form::label('client_id', 'Client') }}<br />
            <?php
                $options = array();
                foreach ($clients as $client) {
                    $options[$client->id] = $client->name;
                } unset($client);
                
                echo Form::select('client_id', $options, $project->client_id, array('class' => 'form-control', 'id' => 'project-client-id'));
            ?>
        </div>
        <div class="form-group">
            {{ Form::label('start_date', 'Start Date') }}
            {{ Form::text('start_date', date('d/m/Y',strtotime($project->start_date)), array('class' => 'form-control datepicker', 'id' => 'project-start-date')) }}
        </div>
        <div class="form-group">
            {{ Form::label('end_date', 'End Date') }}
            {{ Form::text('end_date', date('d/m/Y',strtotime($project->end_date)), array('class' => 'form-control datepicker', 'id' => 'project-end-date')) }}
        </div>
        <div class="form-group">
            {{ Form::label('rate', 'Hourly Rate*') }}
            {{ Form::text('rate', $project->rate, array('class' => 'form-control', 'id' => 'project-rate')) }}
            {{ $errors->first('rate', '<span class="form-error">:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::label('roundup', 'Roundup') }}
            {{ Form::select('roundup', array('quarter_hour' => 'Quarter Hour', 'half_hour' => 'Half Hour', 'hour' => 'Hour'), $project->roundup, array('class' => 'form-control', 'id' => 'project-roundup')) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
            <?php 
                echo link_to_route('projects', 'Cancel', array(), array('class' => 'btn btn-primary'));
            ?>
        </div>
    {{ Form::close() }}
</p>