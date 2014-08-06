<?php

class UserController extends BaseController {
    public function createUser()
    {
        return View::make('create_user')->withTitle('Create User');
    }
    
    public function saveUser()
    {
        // validation rules
        $validation_rules = array(
            'username'          =>  'required',
            'firstname'         =>  'required',
            'email'             =>  'required|email',
            'password'          =>  'required|alphaNum|min:5',
            'password_repeat'   =>  'required|same:password'
        );
        
        // run the validator
        $validator = Validator::make(Input::all(), $validation_rules);
        
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput(Input::except('password', 'password_repeat'));
        } else {
            
            $user = new User;
            
            // collect the data
            $user->username = Input::get('username');
            $user->firstname = Input::get('firstname');
            $user->lastname = Input::get('lastname');
            $user->email = Input::get('email');
            $user->company = Input::get('company');
            $user->password = Hash::make(Input::get('password'));
            
            $user->save();
            
            // get the new user ID so we can log the user in
            $user_id = $user->id;
            
            // now manually log the user in
            Auth::login(User::find($user_id));
            
            // go home
            return Redirect::intended('/');
        }
    }
}