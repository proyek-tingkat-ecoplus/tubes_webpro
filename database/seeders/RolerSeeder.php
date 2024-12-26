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
                'name' => 'Petugas',
                'description' => 'Petugas',
                'permissions' => '*',
            ],
            [
                'name' => 'Admin',
                'description' => 'Admin',
                'permissions' => '*',
            ]
        ]
    );
    }
}
