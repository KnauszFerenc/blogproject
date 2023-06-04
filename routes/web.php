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
    if(!empty($slug) && !preg_match('/^post\//', $slug)){
        return view('page', compact('slug'));
    } elseif (!empty($slug) && preg_match('/^post\//', $slug)){
        $slug = str_replace('post/', '', $slug);
        return view('single', compact('slug'));
    } else {
        return view('homepage');
    }
})->where('slug', '.*');

use App\Http\Controllers\FormController;

Route::post('/save-data', [FormController::class, 'saveData']);

Route::post('/process/options', [OptionsController::class, 'process']);