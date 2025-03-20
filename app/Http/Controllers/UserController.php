<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function privateProfile(){
        // route /profile/{user}
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->get();
        return view('users.profile', compact('posts', 'user'));
    }

    public function updateProfilePhoto(Request $request){
        //route => /profile/update-photo
    $request->validate([
        'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
    ]);

    $user = Auth::user();

    // Store new image
    if ($request->hasFile('picture')) {
        if ($request->picture){
            Storage::disk('public')->delete($user->img_path);
        }
        $path = $request->file('picture')->store('users_image', 'public');
        $user->img_path = $path;
        $user->save();
    }

    return redirect()->back()->with('success', 'Profile photo updated!');
    }

    public function publicProfile(User $user){
        // route /profile/{user}
        if(Auth::check()){
            $posts = Post::where('user_id', $user->id)->get();
            return view('users.public-profile', compact('user', 'posts'));
        }
    }

}

