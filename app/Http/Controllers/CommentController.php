<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post){
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);
    
        $post->comments()->create([
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'body' => $request->comment,
        ]);
    
        return redirect()->back()->with('success', 'Comment added successfully!');
    }

}
