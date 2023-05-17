<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('posts');
// });

Route::get('/', function () {
    return view('posts', [
        // 'posts' => Post::all()

        // fixing n+1 problem with eager loading
        // 'posts' => Post::latest()->with('category', 'author')->get()

        // fixing using with property in the model
        'posts' => Post::latest()->get(),
        'categories' => Category::all()
    ]);
})->name('home');

Route::get('/post/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});

Route::get('/category/{category:slug}', function (Category $category) {
    return view('posts', [
        // 'posts' => $category->posts->load(['category', 'author']) // eager loading, other method is in the model using with property
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');

Route::get('/author/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
});
