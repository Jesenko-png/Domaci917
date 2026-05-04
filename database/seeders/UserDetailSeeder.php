<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserDetail;
use Faker\Factory;

class UserDetailSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();
        $users = User::all();

        foreach ($users as $user) {
            UserDetail::updateOrCreate(
                ['user_id' => $user->id], // ✔ relacija
                ['address' => $faker->address()] // ✔ realna adresa
            );
        }
    }
}
