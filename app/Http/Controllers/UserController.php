<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function profile(User $user){
        // route /profile/{user}
        return view('users.profile', ['user' => $user]);
    }
}

