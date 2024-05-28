<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::prefix(LaravelLocalization::setLocale().'/admin')->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])->group(function () {
    //------------------------------------------------------LOGIN
    Route::get('login', 'Auth\LoginController@showLoginForm');

    Route::post('login', 'Auth\LoginController@login')->name('login');

    //------------------------------------------------------AUTH
    Route::middleware('auth')->group(function () {

    //-------------------------------------------------------INDEX
        Route::view('', 'admin.index')->name('index');

    });



});

//Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/dashboard', function () {
//     // Protected route content
// })->middleware('auth');

