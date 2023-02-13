<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $request->validate(
            [
                'body' => 'required'
            ]
        );


        $post->comments()->create([
            'body' => $request->body,
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
        ]);

        return back();
    }

    public function updateLikes(Post $post)
    {
        $attr = request()->validate(
            [
                'post_id' => 'required',
            ]
        );

        $attr['user_id'] = auth()->user()?->id;

        if (Like::where('user_id', $attr['user_id'])->exists()) {
            return back()->with('success', 'You already liked the post');
        }
        $post->likes()->create($attr);

        return back()->with('success', 'Like added correctly');
    }
}
