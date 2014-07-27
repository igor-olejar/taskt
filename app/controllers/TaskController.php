<?php

class TaskController extends BaseController {
    private $rules = array(
        'description'       =>  'required',
        'start_date'        =>  'required|date',
    );
    
    private $errors;
    
    public function showTasks()
    {
        $tasks = Task::orderBy('updated_at')->paginate(10);
        
        $clients = Client::all();
        $projects = Project::all();
        
        return View::make('tasks')->withTasks($tasks)->withClients($clients)->withProjects($projects)->withTitle('Tasks');
    }
}