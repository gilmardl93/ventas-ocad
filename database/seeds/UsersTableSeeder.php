<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	$faker = Faker::create();

	for ($i = 0; $i < 100; $i++) 
	{
		DB::table('users')->insert([
			'username' 	=> $faker->userName,
			'password'		=> bcrypt('123456'),
			'nombres'		=> $faker->firstName,
			'paterno'		=> $faker->lastname,
			'materno'		=> $faker->lastname,
			'idroles'		=> 1
			]);
	}
    }
}
