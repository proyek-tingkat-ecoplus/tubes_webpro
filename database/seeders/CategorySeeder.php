<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i < 10; $i++) {
            $category = Category::create([
                'name' => $faker->sentence,
                'slug' => $faker->slug,
                'description' => $faker->sentence,
                'user_id' => $i,
            ]);

            for ($j = 1; $j < 5; $j++) {
                $category->forums()->attach($j,  ['created_at' => now(), 'updated_at' => now()]);
            }

        }


    }
}
