<?php

class LoginController extends BaseController {
	


	public function index(){


		return View::make("login");
	}

	public function login(){

		$email = Input::get('email');
		$password = Input::get('password');

		// Check email and password if correct or not

		
	}
}