<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AddUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $amount=$this->command->getOutput()->ask("How much users ou want to make?",default: 500);
        $password=$this->command->ask("What is your password?");
        $hashedPassword=Hash::make($password);
        $faker  = \Faker\Factory::create();
        $this->command->getOutput()->progressStart($amount);
        for ($i = 0; $i < $amount; $i++) {
        User::create([
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'password' => $hashedPassword,


        ]);
        $this->command->getOutput()->progressAdvance(step: 1);
        }
    }
}
