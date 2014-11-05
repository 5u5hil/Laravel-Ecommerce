<?php

class LoginController extends BaseController {

    public function login() {
          if (Auth::check()){
             return Redirect::route('dashboard'); 
        }

        return View::make('theSoul.pages.login');
    }

    public function dashboard() {
        return View::make('theSoul.pages.dashboard');
    }

    public function chk_soul_login() {
        $userdata = array(
            'email' => Input::get('username'),
            'password' => Input::get('password'),
            'user_type' => "1"
        );

        $user = User::where('email', '=', Input::get('username'))->first();
      
        if (isset($user)) {
            if ($user->password == md5(Input::get('password'))) { // If their password is still MD5
                $user->password = Hash::make(Input::get('password')); // Convert to new format
                $user->save();
                if (Auth::attempt($userdata,true)) {

                    return Redirect::route('dashboard');
                } else {
                    return Redirect::route('login');
                }
            } else {
                if (Auth::attempt($userdata)) {

                    return Redirect::route('dashboard');
                } else {
                    return Redirect::route('login');
                }
            }
        }else
        {
              return Redirect::route('login'); 
            
        }
        
        
    }
    
    
    
    public function soul_logout(){
         Auth::logout();
        Session::flush();
        return Redirect::route('login');
    }
    

}
