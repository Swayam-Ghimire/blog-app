<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommentController extends Controller
{
    use AuthorizesRequests;
    public function store(Request $request, Post $post){
        // route comments/{post-id}
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

    public function destroy(Comment $comment){
        // route comments/{comment-id}
        $this->authorize('delete', $comment);
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully');
    }

}
