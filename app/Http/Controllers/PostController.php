<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

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
        // route /post/create
        $posts = Post::where('user_id', Auth::user()->id)->get();
        return view('post.create', compact('posts'));
    }

    public function store(Request $request){
        // route /post method=>post
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:20',
            'picture' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        if ($request->hasFile('picture')){
            $validate['picture'] = Storage::disk('public')->put('posts_image', $request->picture);
        }
        else{
            $validate['picture'] = null;
        }
        $validate['user_id'] = Auth::user()->id;
        Post::create($validate);
        return redirect()->route('post.create')->with('success', 'Added Post Successfully');
    }

    public function show($id){
        // route /post/{post}(id)
        $post = Post::find($id);
        return view('post.show', compact('post'));
    }

    public function edit(){
        
    }

    public function update(){
        
    }

    public function destroy(){
        
    }
}
