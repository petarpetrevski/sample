<?php

use App\Http\Controllers\PostController;
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

// Without Controller:
// Route::get('/', function () {
//     $posts = Post::latest();

//     if (request('search')) {
//         $posts
//             ->where('title', 'like', '%' . request('search') . '%')
//             ->orWhere('body', 'like', '%' . request('search') . '%');
//     }

//     return view('posts', [
//         // 'posts' => Post::all()

//         // fixing n+1 problem with eager loading
//         // 'posts' => Post::latest()->with('category', 'author')->get()

//         // fixing using with property in the model
//         // 'posts' => Post::latest()->get(),


//         'posts' => $posts->get(),
//         'categories' => Category::all()
//     ]);
// })->name('home');

// extracting to controller, using the action: index
Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/post/{post:slug}', [PostController::class, 'show']);

// Route::get('/category/{category:slug}', function (Category $category) {
//     return view('posts', [
//         // 'posts' => $category->posts->load(['category', 'author']) // eager loading, other method is in the model using with property
//         'posts' => $category->posts,
//         'currentCategory' => $category,
//         'categories' => Category::all()
//     ]);
// })->name('category');

Route::get('/author/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts,
        // 'categories' => Category::all() // we don't need to pass categories to the view anymore, using CategoryDropdown component
    ]);
});
