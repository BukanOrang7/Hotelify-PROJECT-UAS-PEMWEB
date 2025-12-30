<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        /** @var \Illuminate\Database\Eloquent\Collection<BlogPost> $posts */
        $posts = BlogPost::whereNotNull('published_at')->latest()->get();
        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        /** @var BlogPost $post */
        $post = BlogPost::where('slug', $slug)->with('author')->firstOrFail();
        return view('blog.show', compact('post'));
    }
}
