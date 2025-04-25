<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;

class KantorDinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FacadesDB::table('kantor_dinas')->insert([
            [
                'nama' => 'Dinas Pendidikan',
                'bio' => 'Dinas Pendidikan adalah instansi pemerintah yang bertanggung jawab dalam pengelolaan pendidikan dan pengajaran di suatu daerah.',
                'alamat' => 'Jl. Pendidikan No. 789, Jakarta',
                'kode_pos' => '54321',
                'no_telp' => '021-11223344',
                'email' => 'pendidikan@gmail.com',
                'website' => 'www.dinaspendidikan.go.id',
                'tanggal_jam_buka' => 'Senin-Jumat jam 08:00 - 17:00'
            ],
            [
                'nama' => 'Dinas Kesehatan',
                'bio' => 'Dinas Kesehatan adalah instansi pemerintah yang bertanggung jawab dalam pengelolaan kesehatan masyarakat di suatu daerah.',
                'alamat' => 'Jl. Kesehatan No. 456, Jakarta',
                'kode_pos' => '67890',
                'no_telp' => '021-22334455',
                'email' => 'kesehatan@gmail.com',
                'website' => 'www.dinaskesehatan.go.id',
                'tanggal_jam_buka' => 'Senin-Jumat jam 08:00 - 17:00'
            ]
        ]
        );
    }
}
