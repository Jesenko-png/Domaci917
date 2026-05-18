<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;

class ForecastController extends Controller
{
    public function index(CitiesModel $city)
    {

        $city = CitiesModel::with('forecasts')
            ->where('id', $city->id)
            ->firstOrFail();

        return view('forecast', compact('city'));

    }
}
