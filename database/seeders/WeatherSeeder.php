<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $prognose=[
          "Beograd" => 22,
          "Novi Sad" => 23,
          "Sarajevo" => 24,
          "Zagreb" => 25,
      ];

      foreach($prognose as $city => $temperature){
          $weather=City::where("name",$city)->first();
          if($weather != null){
              $this->command->error("City allready exists");
              continue;
          }

          City::create([
              "name" => $city,
              "temperature" => $temperature,
          ]);
      }
    }
}
