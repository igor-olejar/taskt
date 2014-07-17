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
}