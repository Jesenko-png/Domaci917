<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $cities = [
            "Beograd" => "22",
            "Novi Sad" => "24",
            "Zagreb" => "20",
            "Sarajevo" => "21"
        ];

        return view('welcome', compact('cities'));
    }
}
