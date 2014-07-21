<p>
    {{ Form::model($project, array('role' => 'form', 'route' => array($route, $project->id))) }}
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
            <?php $sd = ($project->start_date)? date('d/m/Y',strtotime($project->start_date)): ""; ?>
            {{ Form::text('start_date', $sd, array('class' => 'form-control datepicker', 'id' => 'project-start-date')) }}
        </div>
        <div class="form-group">
            {{ Form::label('end_date', 'End Date') }}
            <?php $ed = ($project->end_date)? date('d/m/Y',strtotime($project->end_date)): ""; ?>
            {{ Form::text('end_date', $ed, array('class' => 'form-control datepicker', 'id' => 'project-end-date')) }}
        </div>
        <div class="form-group">
            {{ Form::label('rate', 'Hourly Rate*') }}
            {{ Form::text('rate', $project->rate, array('class' => 'form-control', 'id' => 'project-rate')) }}
            {{ $errors->first('rate', '<span class="form-error">:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::label('roundup', 'Roundup') }}
            <?php $selected = ($project->roundup)? : 'hour'; ?>
            {{ Form::select('roundup', array('quarter_hour' => 'Quarter Hour', 'half_hour' => 'Half Hour', 'hour' => 'Hour'), $selected, array('class' => 'form-control', 'id' => 'project-roundup')) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
            <?php 
                echo link_to_route('projects', 'Cancel', array(), array('class' => 'btn btn-primary'));
            ?>
        </div>
    {{ Form::close() }}
</p>