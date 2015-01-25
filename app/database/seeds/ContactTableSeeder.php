<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ContactTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Contact::create([
				"name" => $faker->name,
				"email" => $faker->email,
				"phone" => $faker->phoneNumber
			]);
		}
	}

}