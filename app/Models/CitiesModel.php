<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CitiesModel extends Model
{
    protected $table = 'cities';

    protected $fillable = ['name'];

    public function forecasts(){
        return $this->hasMany(ForecastModel::class, 'city_id', 'id')->orderBy('forecast_date');
}
public function todayForecasts(){
        return $this->hasOne(ForecastModel::class, 'city_id', 'id')
            ->whereDate("forecast_date", Carbon::now());
}
}
