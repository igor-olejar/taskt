<p>
    {{ Form::model($client, array('role' => 'form', 'route' => array($route, $client->id))) }}
        <div class="form-group">
            {{ Form::label('name', 'Client Name*') }}
            {{ Form::text('name', $client->name, array('class' => 'form-control', 'id' => 'client-name')) }}
            {{ $errors->first('name', '<span class="form-error">:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', $client->description, array('class' => 'form-control', 'id' => 'client-description')) }}
        </div>
        <div class="form-group">
            {{ Form::label('website', 'Website') }}
            {{ Form::text('website', $client->website, array('class' => 'form-control', 'id' => 'client-rate')) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
            <?php 
                echo link_to_route('clients', 'Cancel', array(), array('class' => 'btn btn-primary'));
            ?>
        </div>
    {{ Form::close() }}
</p>