<?php

namespace Database\Seeders;

use App\Models\AddressDetails;
use App\Models\Comment;
use App\Models\Forum;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $defult = [["role_id" => 1, "name" => "Guest", "email" => "guest@gmail.com"],
            ["role_id" => 2, "name" => "Kepala Desa", "email" => "kapdes@gmail.com"],
            ["role_id" => 3, "name" => "Petugas", "email" => "petugas@gmail.com"],
            ["role_id" => 4, "name" => "Admin", "email" => "admin@gmail.com"]];

            if($i < 4){
                $role_id = $defult[$i]["role_id"];
                $name = $defult[$i]["name"];
                $email = $defult[$i]["email"];
            }else{
                $role_id = 1;
                $name = $faker->name;
                $email = $faker->email;
            }

            $user = User::create([
                'username' => $name,
                'email' => $email,
                'password' => Hash::make('password'),
                'role_id' => $role_id,
                "photo" => 'image/profile/default.png',
                'kantor_dinas_id' => $faker->numberBetween(1, 2),

            ]);
            $address = AddressDetails::create([
                'city' => $faker->city,
                'state' => $faker->state,
                'zip' => $faker->postcode,
                'country' => $faker->country,
            ]);
            UserDetails::create([
                'user_id' => $user->id,
                'phone' => $faker->phoneNumber,
                'nik' => $faker->randomNumber(9),
                'bio' => $faker->sentence,
                'address_id' => $address->id,
            ]);
        }
    }
}
