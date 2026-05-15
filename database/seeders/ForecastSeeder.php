<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\City;
use App\Models\ForecastModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $cities = CitiesModel::all();

        foreach($cities as $city){

            $lastTemperature = rand(-10,30);

            for($i = 0; $i < 5; $i++){

                $temperature = rand(
                    $lastTemperature - 5,
                    $lastTemperature + 5
                );

                $probability = null;

                if($temperature <= -10){

                    $weatherType = 'rainy';

                }
                else if($temperature <= 1){

                    $weatherType = 'snowy';

                }
                else if($temperature <= 15){

                    $weatherType = 'cloudy';

                }
                else{

                    $weatherType = 'sunny';

                }

                if($weatherType == 'snowy' || $weatherType == 'rainy'){

                    $probability = rand(1,100);

                }

                ForecastModel::create([

                    'city_id' => $city->id,
                    'temperature' => $temperature,
                    'forecast_date' => Carbon::now()->addDays($i + 1),
                    'weather_type' => $weatherType,
                    'probability' => $probability

                ]);

                $lastTemperature = $temperature;

            }

        }
    }
}
