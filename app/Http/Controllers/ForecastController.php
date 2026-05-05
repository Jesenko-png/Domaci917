<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastModel;

class ForecastController extends Controller
{

        public function index(CitiesModel $city)
        {
        $prognoze = ForecastModel::where(['city_id' => $city->id])->get();
        return view('forecast', compact('prognoze'));
    }
}
