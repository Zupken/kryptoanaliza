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

Route::get('/', function () {
    return view('/home/main');
});

Route::get('/gallery', function () {
    return view('/gallery/gallery');
});

Route::get('/kontakt', function () {
    return view('/contact/contact');
});


Route::get('/verti-form', 'ProductsController@vertiForm');
Route::get('/split-form', 'ProductsController@splitForm');
Route::get('/space-form', 'ProductsController@spaceForm');
Route::get('/shade-form', 'ProductsController@shadeForm');
Route::get('/face-form', 'ProductsController@faceForm');


Route::get('/dom', function () {
    return view('/places/dom/dom');
});

Route::get('/biuro', function () {
    return view('/places/biuro/biuro');
});

Route::get('/relaks', function () {
    return view('/places/relaks/relaks');
});

Route::get('/kryptoanaliza', function () {
    return view('home');
});

Route::get('/deszyfrowaniemd5', 'SzyfrowanieController@deszyfrujmd5');
Route::get('/deszyfrowaniesha1', 'SzyfrowanieController@deszyfrujsha1');
Route::get('/szyfrowaniemd5', 'SzyfrowanieController@szyfrujmd5');
Route::get('/szyfrowaniesha1', 'SzyfrowanieController@szyfrujsha1');
