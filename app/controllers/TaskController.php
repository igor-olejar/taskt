<?php

class TaskController extends BaseController {
    private $rules = array(
        'description'       =>  'required',
        'start_date'        =>  'required|date_format:d/m/Y',
    );
    
    private $errors;
    
    public function showTasks()
    {
        $tasks = Task::orderBy('updated_at');
        
        if (Input::get('status')) {
            $tasks = $tasks->where('status','=',Input::get('status'));
        }
        
        if (Input::get('project')) {
            $tasks = $tasks->where('project_id','=',Input::get('project'));
        }
        
        $tasks = $tasks->paginate(10);
        
        /*
         * @todo Figure out filtering and pagination for client filter
         */
//        if (Input::get('client')) {
//            $tasks = $tasks->filter(function($task) {
//                if ($task->project->client->id == Input::get('client')) {
//                    return $task;
//                }
//            });
//        }
        
        $clients = Client::all();
        $projects = Project::all();
        
        // before showing the view, close any open Checkins
        CheckinController::closeAll();
        
        return View::make('tasks')->withTasks($tasks)->withClients($clients)->withProjects($projects)->withTitle('Tasks');
    }
    
    public function editTask($id)
    {
        $task = Task::find($id);
        
        $projects = Project::all();
        
        return View::make('edit_task')
                ->withTask($task)
                ->withProjects($projects)
                ->withTitle('Edit Task ' . $task->id)
                ->withRoute('task.update');
    }
    
    public function updateTask($id)
    {
        $task = Task::find($id);
        
        if (!$this->_saveTask($task)) {
            return Redirect::to('tasks/' . $id . '/edit')->withInput()->withErrors($this->errors);
        };
        
        Session::flash('msg', 'Task updated successfully.');
        
        return Redirect::to('tasks');
    }
    
    public function addTask()
    {
        $projects = Project::all();
        
        return View::make('add_task')
                ->withTask(new Task)
                ->withProjects($projects)
                ->withTitle('Add New Task ')
                ->withRoute('task.add');
    }
    
    public function saveTask()
    {
        $task = new Task;
        
        if (!$this->_saveTask($task)) {
            return Redirect::to('tasks/add')->withInput()->withErrors($this->errors);
        }
        
        Session::flash('msg', 'Task added successfully');
        
        return Redirect::to('tasks');
    }
    
    public function deleteTask($id)
    {
        $task = Task::find($id);
        $task->delete();
        
        Session::flash('msg', 'Task deleted successfully.');
        
        return Redirect::to('tasks');
    }
    
    
    private function _saveTask($task)
    {
        $validation = Validator::make(Input::all(), $this->rules);
        
        if ($validation->fails()) {
            Session::flash('msg_errors', 'There were errors saving the task. Please review.');
            $this->errors = $validation;
            return false;
        }
        
        // convert dates into MySQL format
        $sd = date_create_from_format('d/m/Y', Input::get('start_date'));
        $ed = date_create_from_format('d/m/Y', Input::get('end_date'));
        
        $task->description = Input::get('description');
        $task->project_id = Input::get('project_id');
        $task->start_date = ($sd) ? $sd->format('Y-m-d H:i:s') : date('Y-m-d H:i:s');
        $task->end_date = ($ed)? $ed->format('Y-m-d H:i:s') : date('Y-m-d H:i:s');
        $task->status = Input::get('status');
        $task->user_id = Auth::user()->id;
        
        return $task->save();
    }
}