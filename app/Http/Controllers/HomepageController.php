<?php

namespace App\Http\Controllers;

use App\Models\WeatherModel;

class HomepageController extends Controller
{
    public function index()
    {
        $cities = WeatherModel::all();


        return view('welcome', compact('cities'));
    }
}
