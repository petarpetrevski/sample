<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view('posts.index', [

            // Using query scope
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
                // )->get()
                // )->simplePaginate(6)
                // )->paginate(6)
                )->paginate(6)->withQueryString() // keeps any passed query strings
        ]);
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
