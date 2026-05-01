<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\City;
use App\Models\WeatherModel;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $cities = WeatherModel::all();


        return view('welcome', compact('cities'));
    }
}
