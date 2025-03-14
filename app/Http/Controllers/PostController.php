<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Post;

class PostController extends Controller
{
    public function home(){
        // route-> /home
        $latestTime = Carbon::now()->subDays(7);
        $posts = Post::where('created_at', '>=', $latestTime)->with('user')->orderBy('created_at', 'desc')->paginate(5);
        $title = "Latest Post";
        return view('home', compact('posts', 'title'));
    }

    public function index(){
        // route -> /post
        $posts = Post::latest()->orderBy('created_at', 'desc')->paginate(10);
        return view('post.index', ['posts'=>$posts]);

    }

    public function create(){

    }

    public function store(){

    }

    public function show(){
        //
    }

    public function edit(){
        
    }

    public function update(){
        
    }

    public function destroy(){
        
    }
}
