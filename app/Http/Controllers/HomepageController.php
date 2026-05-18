<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\WeatherModel;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(Request $request)
    {

        $temperature = WeatherModel::all();

        $cities = collect();

        if($request->city){

            $cities = CitiesModel::with('todayForecasts')->where(
                'name',
                'LIKE',
                '%' . $request->city . '%'
            )->get();

        }

        return view(
            'welcome',
            compact('temperature', 'cities')
        );

    }
}
