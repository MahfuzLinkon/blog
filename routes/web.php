<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionContrller;
use App\Http\Controllers\PostCommentContrller;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/post/{post:slug}', [PostController::class, 'show']);

//Route::get('/categories/{category:slug}', function (Category $category) {
//    return view('posts', [
//        'posts' => $category->posts->load('category', 'author'),
//        'currentCategory' => $category,
//        'categories' => Category::all(),
//    ]);
//})->name('category');

//Route::get('/authors/{author:username}', function (User $author) {
//    return view('posts.index', [
//        'posts' => $author->posts->load('category', 'author'),
////        'categories' => Category::all(),
//    ]);
//});

Route::post('post/{post:slug}/comment', [PostCommentContrller::class, 'store']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionContrller::class, 'crate'])->middleware('guest');
Route::post('/login', [SessionContrller::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionContrller::class, 'destroy']);
