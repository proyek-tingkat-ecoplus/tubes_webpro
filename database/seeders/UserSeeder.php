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

        $user = User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
            "photo" => 'image/profile/default.png',
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

        // ini buat guest
        $user = User::create([
            'username' => 'guest',
            'email' => 'guest@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
            "photo" => 'image/profile/default.png',
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

        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'username' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('password'),
                'role_id' => 1,
                "photo" => 'image/profile/default.png',
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
