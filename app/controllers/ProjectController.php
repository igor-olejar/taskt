<?php

class ProjectController extends BaseController {
    
    private $rules = array(
        'name'      =>  'required',
        'rate'      =>  'required|numeric'
    );
    
    private $errors;
    
    public function showProjects()
    {
        // get existing projects
        $projects = Project::orderBy('name')->get();
        
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
        ))->withTitle('Edit Project ' . $project->name)->withRoute('project.update');
    }
    
    public function updateProject($id)
    {
        $project = Project::find($id);
        
        if (!$this->_saveProject($project)) {
            return Redirect::to('projects/' . $id . '/edit')->withInput()->withErrors($this->errors);
        };
        
        Session::flash('msg', 'Project updated successfully.');
        
        return Redirect::to('projects');
    }
    
    public function addProject()
    {
        // get all clients
        $clients = Client::all();
        
        return View::make('add_project', array('project' => new Project, 'clients' => $clients))->withTitle('Add New Project ')->withRoute('project.add');
    }
    
    public function saveProject()
    {
        $project = new Project;
        
        if (!$this->_saveProject($project)) {
            return Redirect::to('projects/add')->withInput()->withErrors($this->errors);
        }
        
        Session::flash('msg', 'Project added successfully');
        
        return Redirect::to('projects');
    }
    
    public function deleteProject($id)
    {
        $project = Project::find($id);
        $project->delete();
        
        Session::flash('msg', 'Project deleted successfully.');
        
        return Redirect::to('projects');
    }
    
    private function _saveProject($project)
    {
        $validation = Validator::make(Input::all(), $this->rules);
        
        if ($validation->fails()) {
            Session::flash('msg_errors', 'There were errors saving the project. Please review.');
            $this->errors = $validation;
            return false;
        }
        
        // convert dates into MySQL format
        $sd = date_create_from_format('d/m/Y', Input::get('start_date'));
        $ed = date_create_from_format('d/m/Y', Input::get('end_date'));
        
        $project->name = Input::get('name');
        $project->description = Input::get('description');
        $project->client_id = Input::get('client_id');
        $project->start_date = ($sd) ? $sd->format('Y-m-d H:i:s') : date('Y-m-d H:i:s');
        $project->end_date = ($ed)? $ed->format('Y-m-d H:i:s') : date('Y-m-d H:i:s');
        $project->rate = Input::get('rate');
        $project->roundup = Input::get('roundup');
        
        return $project->save();
    }
}