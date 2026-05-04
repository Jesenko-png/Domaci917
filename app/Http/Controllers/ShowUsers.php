<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ShowUsers extends Controller
{
    public function show(){
        $users = User::with('city', 'detail')->get();
        return view('users', compact('users'));
    }

}
