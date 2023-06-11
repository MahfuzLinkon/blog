<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::with(['category', 'author'])->latest()->get(),
        'categories' => Category::all(),
    ]);
})->name('home');

Route::get('/post/{post:slug}', function (Post $post){
    return view('post', [
       'post' => $post,
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts->load('category', 'author'),
        'currentCategory' => $category,
        'categories' => Category::all(),
    ]);
})->name('category');

Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts->load('category', 'author'),
        'categories' => Category::all(),
    ]);
});
