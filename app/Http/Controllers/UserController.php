<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function privateProfile(){
        // route /profile/{user}
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->get();
        return view('users.profile', compact('posts', 'user'));
    }
}

