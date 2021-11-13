<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostComments extends Controller
{
    public function store(Post $post)
    {
        request()->validate([
            'body' => ['required']
        ]);
        
        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'body' => request('body')
        ]);

        return back();
    }
}