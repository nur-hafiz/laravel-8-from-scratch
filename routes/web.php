<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// Route::get('/posts/{post}', function ($id) {
//     return view('post', [
//         'post' => Post::findOrFail($id)
//     ]);

// });

// Using file system instead of DB
// Route::get('/posts/{post}', function ($slug) {
//     return view('post', [
//         'post' => Post::findOrFail($slug)
//     ]);

// })->where('post', '[A-z_\-]+');

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        'categories' => Category::all(),
        'currentCategory' => $category

        // Without with property in Post model
        // 'posts' => $category->posts->load(['category', 'author'])
    ]);
})->name('category');


Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all()

        // Without with property in Post model
        // 'posts' => $author->posts->load(['category', 'author'])
    ]);
});