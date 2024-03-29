<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{
    ShowTweets,
    Counter,
};
use App\Http\Livewire\User\UploadPhoto;

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
 
Route::get('/counter', Counter::class);

Route::middleware('auth')->group(function () {
    Route::get('/tweets', ShowTweets::class)->name('tweets.index');
    Route::get('/upload', UploadPhoto::class)->name('upload.photo.user');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
