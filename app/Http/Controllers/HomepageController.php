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

        $cities = CitiesModel::query()

            ->when($request->city, function ($query) use ($request){

                $query->where(
                    'name',
                    'LIKE',
                    '%' . $request->city . '%'
                );

            })

            ->get();

        return view(
            'welcome',
            compact('temperature', 'cities')
        );

    }
}
