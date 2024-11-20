<?php

namespace Database\Seeders;

use App\Models\Proposal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProposalrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for($i=1; $i<10;$i++){
            $proposal = Proposal::create([
                'user_id' => $i,
                'title' => $faker->sentence,
                'description' => $faker->sentence,
                'attachment' => $faker->imageUrl(),
                'start_date' => $faker->date(),
                'end_date' => $faker->date(),
                'status' => 'pending',
            ]);
        }
    }
}
