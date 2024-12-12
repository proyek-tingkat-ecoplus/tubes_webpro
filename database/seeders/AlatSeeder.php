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

        // Specific latitude and longitude values for Bandung
        $locations = [
            ["latitude" => -6.914744, "longitude" => 107.609810], // Bandung City Center
            ["latitude" => -6.917464, "longitude" => 107.619122], // Near Alun-Alun Bandung
            ["latitude" => -6.899924, "longitude" => 107.623345], // Near Dago
            ["latitude" => -6.917726, "longitude" => 107.590615], // Near Bandung Zoo
            ["latitude" => -6.934469, "longitude" => 107.610920], // Near ITB Campus
            ["latitude" => -6.940074, "longitude" => 107.608242], // Near Cihampelas Walk
            ["latitude" => -6.932932, "longitude" => 107.634766], // Near Trans Studio Bandung
            ["latitude" => -6.898556, "longitude" => 107.623808], // Near Jalan Riau
            ["latitude" => -6.924874, "longitude" => 107.634370], // Near Gedung Sate
            ["latitude" => -6.917180, "longitude" => 107.610928], // Near Braga Street
        ];

        $locationCount = count($locations);

        for ($i = 1; $i <= 10; $i++) { // Loop 10 times for 10 alat
            // Get a location from the array based on the loop index
            $currentLocation = $locations[($i - 1) % $locationCount];

            $alat = Alat::create([
                "user_id" => $i,
                "kode_alat" => $faker->randomNumber(5),
                "nama_alat" => $faker->sentence,
                "foto" => $faker->imageUrl(),
                "jenis" => "elektronik",
                "kondisi" => "baru",
                "jumlah" => $faker->randomNumber(2),
                "deskripsi_barang" => $faker->sentence,
            ]);

            $alat->report_alat()->attach($i, // i itu user id
                [
                    'judul_report' => $faker->sentence,
                    'deskripsi' => $faker->sentence,
                    'latitude' => $currentLocation['latitude'], // Use latitude from array
                    'longitude' => $currentLocation['longitude'], // Use longitude from array
                    'tahun_operasi' => "2024",
                    'binwas' => "",
                    'address' => $faker->address,
                    'photo' => $faker->imageUrl(),
                    'status' => "pending",
                    'tanggal' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
