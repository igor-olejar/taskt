<?php

class UserController extends BaseController {
    public function createUser()
    {
        return View::make('create_user')->withTitle('Create User');
    }
}