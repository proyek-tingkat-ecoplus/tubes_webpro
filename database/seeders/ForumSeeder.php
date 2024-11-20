<?php

namespace Database\Seeders;

use App\Models\Forum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i < 10; $i++) {

            Forum::create([
                'name' => $faker->sentence,
                'slug' => $faker->slug,
                'description' => $faker->sentence,
                'user_id' => $i,
            ]);
        }
    }
}
