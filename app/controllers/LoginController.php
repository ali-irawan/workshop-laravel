<?php

class LoginController extends BaseController {
	


	public function index(){


		return View::make("login");
	}

	public function login(){

		$email = Input::get('email');
		$password = Input::get('password');

		// Check email and password if correct or not
		if(Auth::attempt([ 'email' => $email,  
			               'password' => $password ])){

			return Redirect::to('/');
		} else {
			Session::flash('errors','Unable to login');
			return Redirect::to('/login');
		}

	}
}