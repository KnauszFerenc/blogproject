<?php

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
    return view('homepage');
})->name('home');

Route::get('/back_entry', function () {
    return view('admin/adminhome');
})->name('admin');

Route::get('/back_entry/posts', function () {
    return view('admin/posts');
});

Route::get('/back_entry/pages', function () {
    return view('admin/pages');
});

Route::get('/back_entry/posteditor', function () {
    return view('admin/posteditor');
});

Route::get('/back_entry/users', function () {
    return view('admin/users');
});

Route::get('/back_entry/account', function () {
    return view('admin/account');
});

Route::get('/back_entry/options', function () {
    return view('admin/options');
});

Route::get('/{slug}', function($slug) {
        return view('page', compact('slug'));
})->where('slug', '.*');

Route::get('/post/{slug}', function($slug) {
    $slug = str_replace('post/', '', $slug);
    return view('single', compact('slug'));
});

use App\Http\Controllers\OptionsController;

Route::post('/process/options', [OptionsController::class, 'process'])->name('options.process');

use App\Http\Controllers\PostController;

Route::post('/process/post', [PostController::class, 'process'])->name('post.process');