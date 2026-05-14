<?php

namespace App\Http\Controllers;

use App\Models\ForecastModel;
use Illuminate\Http\Request;

class AdminForecastController extends Controller
{
    public function store(Request $request){
       $validated= $request->validate([
            "city_id" => "required|exists:cities,id",
            "temperature" => "required",
            "weather_type" => "required",
            "forecast_date" => "required",
        ]);

        ForecastModel::create($validated);
        return redirect()->back();
    }
}
