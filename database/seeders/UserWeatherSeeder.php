<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city=$this->command->ask('What is your city?');
        $temperature=$this->command->ask('What is your temperature?');
        if(empty($city) || empty($temperature)){
            $this->command->info("City or temperature can't be empty");
            return;
        }
        City::create([
            'name' => $city,
            'temperature' => $temperature,
        ]);
        $this->command->info("City $city has been created with temperature $temperature");


    }
}
