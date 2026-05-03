<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function store(Request $request){
        CitiesModel::create([
            "name" => $request->name,
            "temperature" => $request->temperature
        ]);
        return redirect()->back();
    }
    public function index(){
        return view('add');
    }
}
