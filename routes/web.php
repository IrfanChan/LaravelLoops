<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/detail/{posts:slug}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
Route::post('/detail/komentar/save', [App\Http\Controllers\HomeController::class, 'store'])->name('store');



Route::middleware('auth')->name('posts.')->controller(PostController::class)->group(function () {
    Route::get('/post', 'index')->name('index');
    Route::get('/post/add', 'add')->name('add');
    Route::post('/posts/save', 'created')->name('save');
    Route::get('/post/{posts:id}/edit', 'edit')->name('edit');
    Route::patch('/post/{posts:id}/update', 'update')->name('update');
    Route::delete('/post/{posts:id}/delete', 'delete')->name('delete');

});
