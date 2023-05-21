<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use Illuminate\Validation\ValidationException;

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




// extracting to controller, using the action: index
// posts
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/post/{post:slug}', [PostController::class, 'show']);

Route::get('/admin/post/create', [PostController::class, 'create'])->middleware('admin');
Route::post('/admin/post', [PostController::class, 'store'])->middleware('admin');

// comments
Route::post('/post/{post:slug}/comments', [CommentController::class, 'store']);

// newsletter
Route::post('newsletter', NewsletterController::class);

// registering
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

// logging in
Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionController::class, 'store'])->middleware('guest');

// log out
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');




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


// Route::get('/category/{category:slug}', function (Category $category) {
//     return view('posts', [
//         // 'posts' => $category->posts->load(['category', 'author']) // eager loading, other method is in the model using with property
//         'posts' => $category->posts,
//         'currentCategory' => $category,
//         'categories' => Category::all()
//     ]);
// })->name('category');

// Route::get('/author/{author:username}', function (User $author) {
//     return view('posts.show', [
//         'posts' => $author->posts,
//         // 'categories' => Category::all() // we don't need to pass categories to the view anymore, using CategoryDropdown component
//     ]);
// });
