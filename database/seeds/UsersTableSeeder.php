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
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 15; $i++){

            \App\User::create([
                'name'	=> $faker->name,
                'email'	=> $faker->email,
                'password'	=> bcrypt('123456789')
            ]);
        }
    }
}
