<?php

class ContactController extends BaseController {
	
	public function index(){
		$list = Contact::orderBy('name','asc')->get();
		return Response::json([
			"list" => $list
		]);
	}
	public function store(){
		$input = Input::all();

		$validator = Validator::make( $input, Contact::$rules );
		if ($validator->fails())
		{
			return Response::json([
				"status" => "FAIL",
				"errors" => $validator->messages()
			]);
		}

		// Validation passed
		$obj = new Contact($input);
		$obj->save();

		return Response::json([
			"status" => "OK"
		]);
	}

	public function update($id){

		$input = Input::all();

		$validator = Validator::make( $input, Contact::$rules );
		if ($validator->fails())
		{
			return Response::json([
				"status" => "FAIL",
				"errors" => $validator->messages()
			]);
		}

		// Validation passed
		$obj = Contact::find($id);
		$obj->name = $input['name'];
		$obj->email = $input['email'];
		$obj->phone = $input['phone'];
		$obj->save();

		return Response::json([
			"status" => "OK"
		]);

	}

	public function destroy($id){
		Contact::destroy($id);
		return Response::json([ "status" => "OK" ]);
	}


}