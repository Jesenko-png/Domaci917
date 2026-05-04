<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateFakerUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $city = CitiesModel::inRandomOrder()->first();


            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'city_id' => $city->id,
            ]);
        }

    }
}
