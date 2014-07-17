<?php

class ProjectController extends BaseController {
    
    public function showProjects()
    {
        // get existing projects
        $projects = Project::all();
        
        // show them
        return View::make('projects', array('projects' => $projects))->withTitle('Projects');
    }
}