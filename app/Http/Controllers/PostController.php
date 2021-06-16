<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index () 
    {

        $post = Post::latest()->filter(request(['search']))->get();
    
        return view('posts', [
            'posts' => $post,
            'categories' => Category::all()
    
            // Without with property in Post model
            // 'posts' => Post::latest()->with('category' , 'author')->get()
    
            // If wanna order latest by pulished_at date
            // 'posts' => Post::latest('published_at')->with('category')->get()
        ]);
    }

    public function show (Post $post) {
        return view('post', [
            'post' => $post
        ]);
    }
}
