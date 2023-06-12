<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/post/{post:slug}', [PostController::class, 'show']);

//Route::get('/categories/{category:slug}', function (Category $category) {
//    return view('posts', [
//        'posts' => $category->posts->load('category', 'author'),
//        'currentCategory' => $category,
//        'categories' => Category::all(),
//    ]);
//})->name('category');

Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts->load('category', 'author'),
//        'categories' => Category::all(),
    ]);
});
