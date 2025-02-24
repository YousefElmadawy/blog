<?php

use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');

});
 
 
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/posts',[HomeController::class,'posts'])->name('posts');
Route::get('/post/{post}',[HomeController::class,'show'])->name('show');
Route::get('/post/{post}',[HomeController::class,'show'])->name('show');

Route::get('/posts/{post}/comments/{comment}',[CommentController::class,]);
 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__. '/dashboard.php';
