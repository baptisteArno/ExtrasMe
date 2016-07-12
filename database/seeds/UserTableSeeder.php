<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run()
	{
		DB::table('users')->delete();

		for($i = 0; $i < 5; ++$i)
		{
			DB::table('users')->insert([
				'email' => 'email' . $i . '@ehl.ch',
				'password' => bcrypt('password' . $i),
				'type' => 0,
			]);
		}

		for($i = 5; $i < 10; ++$i)
		{
			DB::table('users')->insert([
				'email' => 'email' . $i . '@gmail.com',
				'password' => bcrypt('password' . $i),
				'type' => 1,
			]);
		}

		DB::table('professionals')->delete();

		for($i = 5; $i < 10; ++$i)
		{
			DB::table('professionals')->insert([
				'company_name' => 'Nom'.$i,
				'category' => 'hotel',
				'first_name' => 'Jean',
				'last_name' => 'Dupont',
				'phone' => '0290942',
				'zipcode' => 75007,
				'state' => 'Ile-De-France',
				'country' => 'France',
				'address' => '31 avenue Victor Hugo',
				'credit' => 100,
				'user_id' => $i+1,
			]);
		}

		DB::table('students')->delete();

		for($i = 0; $i < 5; ++$i)
		{
			DB::table('students')->insert([
				'last_name' => 'Pauker',
				'first_name' => 'Bruce',
				'nationality' => 'French',
				'school_year' => 'BOSC 2',
				'phone' => '097398472',
				'gender' => 0,
				'birthdate' => Carbon::createFromDate(null, rand(1, 12), rand(1, 28)),
				'user_id' => $i+1,
			]);
		}
	}
}