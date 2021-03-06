<?php

class Contact extends \Eloquent {
	public static $rules = [
		"name" => "required",
		"email" => "required|email",
		"phone" => "required",
	];
	protected $fillable = ["name","email","phone"];
	protected $table = "contacts";
}