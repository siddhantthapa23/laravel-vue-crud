<?php

use App\User;
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

        User::create([
            'name' => $faker->name("male"),
            'email' => 'admin@demo.com',
            'password' => bcrypt('password@demo'),
            'remember_token' => str_random(60)
        ]);
    }
}