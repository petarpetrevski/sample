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

    public function create() {

        return view('posts.create');
    }

    public function store() {

        $attributes = request()->validate([
            'title' => ['required'],
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = Auth::user()->id;

        Post::create($attributes);

        return redirect('/')->with('success', 'Your post was successfuly published!');
    }
}
