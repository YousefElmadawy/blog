<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('frontend.index', compact('posts', 'categories'));
    }

    public function posts()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('frontend.posts.index', compact('posts', 'categories'));
    }



    public function show($id)
    {

        // $post = Post::findOrFail($post->id);

        $post = Post::with('comments')->find($id);
        return view('frontend.posts.show', compact('post'));
    }

    // public function getComments(Comment $comment ){

    //     $comment=Comment::findOrFail($post->id);
    //     return view('frontend.posts.show' ,compact('post',));

    // }
}
