<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::view('/', 'welcome');

Route::resource('/posts', PostController::class);

//Route::get('/search', [PostController::class, 'search'])->name('posts.search');

Route::get('search', function() {
    $query = ''; // <-- Change the query for testing.

    $articles = App\Article::search($query)->get();

    return $articles;
});