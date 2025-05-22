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
        $list_pertanyaan = [
            'Apa itu proposal?',
            'Bagaimana cara membuat proposal?',
            'Apa saja syarat untuk mengajukan proposal?',
            'Berapa lama waktu yang dibutuhkan untuk menyetujui proposal?',
            'Apa yang harus dilakukan jika proposal ditolak?',
            'Bagaimana cara mengajukan banding atas penolakan proposal?',
            'Apa saja dokumen yang diperlukan untuk mengajukan proposal?',
            'Bagaimana cara menghubungi pihak yang berwenang terkait proposal?',
            'Apa saja langkah-langkah dalam proses pengajuan proposal?',
            'Bagaimana cara mendapatkan informasi lebih lanjut tentang pengajuan proposal?',
        ];
        for ($i = 1; $i < 10; $i++) {
            // ini akn masih random
            Forum::create([
                'name' => $list_pertanyaan[$i],
                'slug' => $faker->slug,
                'description' => $faker->sentence,
                'user_id' => $i,
            ]);
        }
    }
}
