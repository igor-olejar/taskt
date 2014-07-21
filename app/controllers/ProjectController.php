<?php

class ProjectController extends BaseController {
    
    public function showProjects()
    {
        // get existing projects
        $projects = Project::all();
        
        // show them
        return View::make('projects', array('projects' => $projects))->withTitle('Projects');
    }
    
    public function editProject($id)
    {
        // get project data
        $project = Project::find($id);
        
        // get all clients
        $clients = Client::all();
        
        return View::make('edit_project', array(
            'project'       =>  $project,
            'clients'       =>  $clients
        ))->withTitle('Edit Project ' . $project->name);
    }
    
    public function updateProject($id)
    {
        $rules = array(
            'name'      =>  'required',
            'rate'      =>  'required|numeric'
        );
        
        $validation = Validator::make(Input::all(), $rules);
        
        if ($validation->fails()) {
            Session::flash('msg_errors', 'There were errors saving the project. Please review.');
            return Redirect::to('projects/' . $id . '/edit')->withInput()->withErrors($validation);
        }
        
        // convert dates into MySQL format
        $sd = date_create_from_format('d/m/Y', Input::get('start_date'));
        $ed = date_create_from_format('d/m/Y', Input::get('end_date'));
        
        $project = Project::find($id);
        $project->name = Input::get('name');
        $project->description = Input::get('description');
        $project->client_id = Input::get('client_id');
        $project->start_date = $sd->format('Y-m-d H:i:s');
        $project->end_date = $ed->format('Y-m-d H:i:s');
        $project->rate = Input::get('rate');
        $project->roundup = Input::get('roundup');
        $project->save();
        
        Session::flash('msg', 'Project updated successfully.');
        
        return Redirect::to('projects');
    }
}