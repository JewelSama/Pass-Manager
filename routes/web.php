<?php

use App\Http\Controllers\PostController;
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

Route::get('/pass', function () {
    return view('pass.profile');
});

//store posts data
// Route::post('/posts', [PostController::class, 'store'])->name('posts');
// Route::get('/pass', [PostController::class, 'index'])->name('posts');

//show create form
Route::get('/create', [PostController::class, 'create']);
Route::post('/pass', [PostController::class, 'store']);

