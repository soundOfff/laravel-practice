<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view(
            'admin.posts.index',
            [
                'posts' => Post::paginate(6)
            ]
        );
    }


    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {

        Post::create(array_merge(
            $this->validatePost(),
            [
                'user_id' => 2,
                'thumbnail' => request()->file('thumbnail')->store('thumbnails', 'public')

            ],
        ));

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attr = $this->validatePost($post);

        if ($attr['thumbnail'] ?? false) {
            $attr['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }


        $post->update($attr);

        return back()->with('success', 'Update successful');
    }

    public function destroy(Post $post)
    {

        $post->delete();

        return back()->with('success', 'Delete successful');
    }

    private function validatePost(?Post $post = null)
    {
        // Store -> null 
        // UpdatePost -> exist

        $post ??= new Post();
        return request()->validate(
            [
                'title' => 'required',
                'thumbnail' => $post->exists ? ['image'] : ['image'],
                'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
                'excerpt' => 'required',
                'body' => 'required',
                'category_id' => ['required', Rule::exists('categories', 'id')]
            ]
        );
    }
}
