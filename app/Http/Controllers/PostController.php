<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view("posts.show", [
            'post' => $post
        ]);
    }
    
    public function create()
    {
        return view("posts.create");
    }

    public function store()
    {
        $path = request()->file('thumbnail')->store('thumbnails');

        return 'Done: ' . $path;
        // $attributes = request()->validate([
        //     'title' => ['required'],
        //     'slug' => ['required', Rule::unique('posts', 'slug')],
        //     'excerpt' => ['required'],
        //     'body' => ['required'],
        //     'category_id' => ['required', Rule::exists('categories', 'id')]
        // ]);

        // $attributes['user_id'] = auth()->user()->id;

        // Post::create($attributes);

        // return redirect('/')->with('success', 'Post published!');
    }
}