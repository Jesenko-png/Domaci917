<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherModel;

class WeatherController extends Controller
{
    public function index(){

    $prognosis = WeatherModel::all();

    return view('/prognose', compact('prognosis'));
}
}
