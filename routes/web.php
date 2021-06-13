<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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

Route::get('/', function () {
    return Post::find('my-first-post');
    return view('welcome');
});

Route::get('/posts', function () {
    return view('posts', [
        'posts' => Post::latest()->with('category' , 'author')->get()
        // If wanna order latest by pulished_at date
        // 'posts' => Post::latest('published_at')->with('category')->get()
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});

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

Route::get('/categories/{category}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});


Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts
    ]);
});