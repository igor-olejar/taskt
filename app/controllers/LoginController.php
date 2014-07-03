<?php

class LoginController extends BaseController {
    
    /**
     * Show the login form
     * @return void
     */
    public function showLogin()
    {
        return View::make('login');
    }
    
    /**
     * Login the user
     * @return void
     */
    public function doLogin()
    {
        // validation rules
        $rules = array(
            'username'      =>  'required',
            'password'      =>  'required|alphaNum|min:5'
        );
        
        // run the validator
        $validator = Validator::make(Input::all(), $rules);
        
        // see if the validator fails
        if ($validator->fails()) {
            return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
        } else {
            // collect user's data
            $userdata = array(
                'username'      =>  Input::get('username'),
                'password'      =>  Input::get('password')
            );
            
            // log in the user
            if (Auth::attempt($userdata)) {
                return Redirect::to('/');
            } else {
                return Redirect::to('login');
            }
        }
    }
    
    public function doLogout()
    {
        Auth::logout();
        return Redirect::to('login');
    }
}