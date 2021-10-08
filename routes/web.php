<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Livewire\Blogs;

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

Route::get('category',function(){
    return view('category');
});

Route::get('blog', Blogs::class)->name('blog');
Route::view('laravel-livewire-upload-multiple-image','livewire.home');

Route::get('banner', [BannerController::class, "index"]);
Route::post('banner', [BannerController::class, "imageCropPost"])->name("banner");

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
