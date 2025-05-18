<?php

namespace Database\Seeders;

use App\Models\Proposal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Dummy\dummyProposal;


class ProposalrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $data = DummyProposal::get(); // Menggunakan kelas yang benar

        // Generate proposals dengan status berbeda
        $this->generateProposals('pending', 12, $data, $faker);
        $this->generateProposals('approved', 10, $data, $faker);
        $this->generateProposals('rejected', 12, $data, $faker);
    }

    private function generateProposals($status, $count, $data, $faker): void
    {
        for ($i = 0; $i < $count; $i++) { // Menggunakan indeks dari 0
            Proposal::create([
                'user_id' => $faker->numberBetween(1, 10),
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'daerah' => $faker->randomElement(['bandung_barat', 'bandung_timur', 'bandung_selatan']),
                'attachment' => $faker->imageUrl(640, 480, 'business', true),
                'tanggal_pengajuan' => $data[$i]['tanggal_pengajuan'],
                'start_date' => $data[$i]['start_date'],
                'end_date' => $data[$i]['end_date'],
                'status' => $status,
            ]);
        }
    }
}
