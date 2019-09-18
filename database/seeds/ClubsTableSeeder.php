<?php

use App\Club;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Club::create([
            'name' => $faker->company,
            'address' => $faker->address,
            'website' => $faker->url,
            'email' => $faker->companyEmail
        ]);

        Club::create([
            'name' => $faker->company,
            'address' => $faker->address,
            'website' => $faker->url,
            'email' => $faker->companyEmail
        ]);
    }
}