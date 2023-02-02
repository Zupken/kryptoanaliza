<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VertiFormController;

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

Route::get('/kryptoanaliza', function () {
    return view('home');
});

Route::get('/deszyfrowaniemd5', 'SzyfrowanieController@deszyfrujmd5');
Route::get('/deszyfrowaniesha1', 'SzyfrowanieController@deszyfrujsha1');
Route::get('/szyfrowaniemd5', 'SzyfrowanieController@szyfrujmd5');
Route::get('/szyfrowaniesha1', 'SzyfrowanieController@szyfrujsha1');
