<?php

    namespace App\Http\Controllers;

    use App\Models\CitiesModel;
    use App\Models\WeatherModel;
    use Illuminate\Http\Request;

    class CityController extends Controller
    {
        public function store(Request $request){
            $city=CitiesModel::create([
                "name" => $request->name,
            ]);
            WeatherModel::create([
                "temperature" => $request->temperature,
                "city_id" => $city->id
            ]);
            return redirect()->back();
        }
        public function index(){
            return view('add');
        }
    }
