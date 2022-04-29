<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 10; $i++) { 
	    	User::create([
                'phone' => '62'.rand(),
	            'name' => $faker->name,
	            'email' => $faker->email,
	            'password' => Hash::make('12345678'),
	        ]);
    	}
    }
}
