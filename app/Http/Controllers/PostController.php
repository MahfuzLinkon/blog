<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
//        $post = Post::with(['category', 'author'])->latest();
//        if (request('search')){
//            $post->where('title','like', '%'. request('search') . '%')
//                ->orWhere('body', 'like', '%'. request('search') . '%');
//        }

        return view('posts.index', [
//            'posts' => $post->get(),
            'posts' =>  Post::with(['category', 'author'])->latest()->filter(request(['search', 'category']))->get(),
//            'categories' => Category::all(),
//            'currentCategory' => Category::firstWhere('slug', request('category')),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

//    protected function getPosts(){
//        return Post::latest()->filter()->get();
//        $post = Post::with(['category', 'author'])->latest();
//        if (request('search')){
//            $post->where('title','like', '%'. request('search') . '%')
//                ->orWhere('body', 'like', '%'. request('search') . '%');
//        }
//        return $post->get();
//    }











}
