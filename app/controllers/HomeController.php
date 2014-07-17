<?php

class HomeController extends BaseController {

    public function showOptions()
    {
        return View::make('welcome')->withTitle('Home');
    }

}
