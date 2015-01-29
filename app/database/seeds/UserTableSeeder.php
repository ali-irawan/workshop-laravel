<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		User::truncate();
		
		$user = new User();
		$user->email = 'boylevantz@gmail.com';
		$user->password = Hash::make('123456');
		$user->save();
	}

}