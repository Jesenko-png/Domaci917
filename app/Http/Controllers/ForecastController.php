<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForecastController extends Controller
{
    public function index($city){
    $forecasts = [
        'beograd' => [21,22,23,24,25],
        'sarajevo' => [25,21,23,24,25],
    ];
    $city=strtolower($city);
    if(!array_key_exists($city, $forecasts)){
        die("Ovaj grad ne postoji");
    }
    dd($forecasts[$city]);
    }
}
