<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



// Route::get('/', function () {
//     return view('welcome');
// });

/*
|--------------------------------------------------------------------------
| ADMIN Routes
|--------------------------------------------------------------------------

*/
Route::prefix(LaravelLocalization::setLocale() . '/admin')->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])->group(function () {

    //------------------------------------------------------LOGIN
    Route::get('login', 'Auth\LoginController@showLoginForm');

    Route::post('login', 'Auth\LoginController@login')->name('login');

    //------------------------------------------------------AUTH
    Route::middleware('auth')->group(function () {

        //------------------------------------------------------LOGOUT
            Route::post('', 'Auth\LoginController@logout')->name('logout');

        //-------------------------------------------------------HOME PAGE
            Route::view('', 'admin.index')->name('index');

        //-------------------------------------------------------ITEM
            Route::view('', 'admin.index')->name('index');
    });
});

//Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/dashboard', function () {
//     // Protected route content
// })->middleware('auth');
