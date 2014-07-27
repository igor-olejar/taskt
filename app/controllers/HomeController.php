<?php

class HomeController extends BaseController {

    public function showOptions()
    {
        $tasks = Task::orderBy('updated_at')->where('status','<>', 'completed')->limit(5)->get();
        
        return View::make('welcome')->withTasks($tasks)->withTitle('Home');
    }

}
