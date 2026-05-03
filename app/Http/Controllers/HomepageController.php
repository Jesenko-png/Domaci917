<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\WeatherModel;

class HomepageController extends Controller
{
    public function index()
    {
        $temperature = WeatherModel::all();
        $cities = City::all();


        return view('welcome', compact('temperature','cities'));
    }
}
