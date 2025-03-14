<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException as ValidationException;
class AuthController extends Controller
{
    public function authRegister(){
        // route -> auth/register 
        return view('auth.register');
    }
    public function authLogin(){
        // route -> auth/login
        return view('auth.login');
    }
    public function register(Request $request){
        // route -> auth/register method => post
        $validate = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|max:15|confirmed',
            'picture' => 'nullable|file|mimes:png,jpg,jpeg',
        ]);
        $path = null;
        if ($request->hasFile('picture')){
            $path = Storage::disk('public')->put('users_image', $request->picture);
        }
        $validate['remember_token'] = Str::random(10);
        $validate['img_path'] = $path;
        User::create($validate);
        return redirect()->route('login')->with(['success' => 'User registered successfully']);
    }
    public function login(Request $request){
        //route -> auth/login method => post
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        
        ]);
        if (Auth::attempt($validate)){
            $request->session()->regenerate();
            return redirect()->route('post.index');
        }
        else{
            throw ValidationException::withMessages(['credential'=>'Credential not verified']);
        }
    }
    public function authLogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login')->with(['success'=>'Logged out successfully']);
    }
}
