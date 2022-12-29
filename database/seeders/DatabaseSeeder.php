<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\User;

use App\Models\Submission;

use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {

            // insert data ke table pegawai menggunakan Faker
            Submission::query()->create([
                'user_id' => $faker->numberBetween(1, 50),
                'title' => $faker->name,
                'description' => $faker->sentence(mt_rand(2, 8)),
                'category_id' => $faker->numberBetween(1, 10),
                'price' => $faker->numberBetween(10000, 2000000),
                'qty' => $faker->numberBetween(1, 50),
                'uom_id' => $faker->numberBetween(1, 50),
                'location_id' => $faker->numberBetween(1, 50)
            ]);

            User::query()->create([
                "name" => $faker->name,
                "email" => $faker->email,
                "telephone" => $faker->numberBetween(100000, 10000000),
                "password" =>  "password",

            ]);
        }
    }
}
