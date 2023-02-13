<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\Rule;

class PostController extends Controller
{

    public function index()
    {

        return view('posts.index', [
            'posts' => Post::filter(request(['search', 'category', 'author']))->paginate(5)->withQueryString()
        ]);
    }


    public function show(Post $post)
    {
        $this->incrementViews($post);
        return view('posts.show', [
            'post' =>  $post
        ]);
    }

    protected function incrementViews(Post $post)
    {
        $post->views_count++;
        $post->save();
    }
}
