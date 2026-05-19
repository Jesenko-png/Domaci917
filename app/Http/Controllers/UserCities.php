<?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use App\Models\UserDetail;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class UserCities extends Controller
    {
        public function favourites(Request $request){
           $ulogovan = Auth::user();

               if($ulogovan){
                   die("more");
               }
               else {
      return redirect()->route("login")->with("error", "Morate biti ulogovani da biste spremili u favorite");
               }
        }
    }
