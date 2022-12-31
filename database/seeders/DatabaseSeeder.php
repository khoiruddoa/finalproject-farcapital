<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
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


        Category::query()->create([
            'category_name' => 'Buah-buahan'
        ]);
        Category::query()->create([
            'category_name' => 'Transportasi'
        ]);
        Category::query()->create([
            'category_name' => 'Rumah Tangga'
        ]);
        Category::query()->create([
            'category_name' => 'sayuran'
        ]);
        Category::query()->create([
            'category_name' => 'makanan'
        ]);
        Category::query()->create([
            'category_name' => 'Minuman'
        ]);
        Category::query()->create([
            'category_name' => 'Perabotan'
        ]);
        Category::query()->create([
            'category_name' => 'Buah-buahan'
        ]);
        Category::query()->create([
            'category_name' => 'Tanaman'
        ]);
        Category::query()->create([
            'category_name' => 'Digital'
        ]);

        $faker = Faker::create('id_ID');

        // for ($i = 1; $i <= 50; $i++) {

        //     // insert data ke table pegawai menggunakan Faker
        //     Submission::query()->create([
        //         'user_id' => $faker->numberBetween(1, 50),
        //         'title' => $faker->name,
        //         'description' => $faker->sentence(mt_rand(2, 8)),
        //         'category_id' => $faker->numberBetween(1, 10),
        //         'price' => $faker->numberBetween(10000, 2000000),
        //         'location_id' => $faker->numberBetween(1, 50)
        //     ]);

        //     User::query()->create([
        //         "name" => $faker->name,
        //         "email" => $faker->email,
        //         "telephone" => $faker->numberBetween(100000, 10000000),
        //         "password" =>  "password",

        //     ]);
        // }
    }
}
