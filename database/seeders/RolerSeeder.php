<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            [
                'name' => 'Guest',
                'description' => 'Guest',
                'permissions' => '*',
            ],
            [
                'name' => 'Kepala Desa',
                'description' => 'Kepala Desa',
                'permissions' => '*',
            ],
            [
                'name' => 'Petugas',
                'description' => 'Ketua Petugas',
                'permissions' => '*',
            ],
            [
                'name' => 'Admin',
                'description' => 'Admin',
                'permissions' => '*',
            ],
            [
                'name' => 'Petugas',
                'description' => 'Wakil Petugas',
                'permissions' => '*',
            ],
            [
                'name' => 'Petugas',
                'description' => 'Sekretaris Petugas',
                'permissions' => '*',
            ],
            [
                'name' => 'Petugas',
                'description' => 'Bendahara Petugas',
                'permissions' => '*',
            ],
            [
                'name' => 'Petugas',
                'description' => 'Anggota Petugas',
                'permissions' => '*',
            ],
        ]
    );
    }
}
