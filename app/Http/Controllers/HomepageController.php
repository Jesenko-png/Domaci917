<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $cities = City::all();


        return view('welcome', compact('cities'));
    }
}
