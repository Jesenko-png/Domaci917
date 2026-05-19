<?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use App\Models\UserDetail;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class UserCities extends Controller
    {
        public function favourites(Request $request , $city){
           $user = Auth::user();

           if(!$user){
                 return redirect()->route("login")->with("error", "Morate biti ulogovani da biste spremili u favorite");
           }
               \App\Models\UserCitiesModel::create([
                   'city_id' => $city,
                   "user_id" => $user->id
               ]);
        }
    }
