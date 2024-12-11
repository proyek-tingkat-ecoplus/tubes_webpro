<?php

namespace Database\Seeders;

use App\Models\Alat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i=1; $i < 10 ; $i++) {
            $alat = Alat::create([
                "user_id" => $i,
                "kode_alat" => $faker->randomNumber(5),
                "nama_alat" => $faker->sentence,
                "foto" => $faker->imageUrl(),
                "jenis" => "elektronik",
                "kondisi" =>"baru",
                "jumlah" => $faker->randomNumber(2),
                "deskripsi_barang" => $faker->sentence,
            ]);
            $alat->report_alat()->attach($i, // i itu user id
                        ['judul_report'=> $faker->sentence,
                        'deskripsi' => $faker->sentence,
                        'latitude' => $faker->latitude(),
                        'longitude' => $faker->longitude(),
                        'tahun_operasi' => "2024",
                        'binwas' => "",
                        'address' => $faker->address,
                        'photo' => $faker->imageUrl(),
                        'status' => "pending",
                        'tanggal' => now(),
                        'created_at' => now(),
                        'updated_at' => now()]);


        }


    }
}
