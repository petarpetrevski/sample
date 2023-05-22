<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class PostController extends Controller
{

    // THE 7 RESTFUL ACTIONS, BEST PRACTICE IS TO STICK TO THESE IN THE CONTROLLERS
    // index, show, create, store, edit, update, destroy


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
