<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherModel;

class WeatherController extends Controller
{
    public function index()
    {

        $prognosis = WeatherModel::all();

        return view('/prognose', compact('prognosis'));
    }

    public function store(Request $request)
    {
        $city_id = $request->city_id;
        $temperatura = $request->temperature;

        $weather = WeatherModel::where('city_id', $city_id)->first();

        $weather->update([
            'temperature' => $temperatura
        ]);
        return redirect()->back();


    }
}
