<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitePostController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('configs',function(){
    return view('backend.configs');
})->name('configs');

Route::get('posts',function(){
    return view('backend.posts');
})->name('posts');

Route::get('categories',function(){
    return view('backend.categories');
})->name('categories');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['prefix' => 'site/{subsite}'], function () {
    Route::get('/',[SitePostController::class,'index'])->name('site');
    Route::get('{post}',[SitePostController::class,'index'])->name('site-post');
});
