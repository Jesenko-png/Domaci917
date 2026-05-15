<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForecastModel extends Model
{
    protected $table = 'forecast';

    protected $fillable = ['city_id', 'temperature', 'forecast_date' , 'weather_type' , 'probability'];
    const WEATHERS = ['rainy', 'snowy' , 'sunny','cloudy'];

    public function city()
    {
        return $this->belongsTo(CitiesModel::class, 'id', 'city_id');
    }
}
