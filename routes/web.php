<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




Route::prefix(LaravelLocalization::setLocale().'/admin')->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])->group(function () {
    //------------------------------------------------------LOGIN ROUTES
    Route::get('login', 'Auth\LoginController@showLoginForm');

    Route::post('login', 'Auth\LoginController@login')->name('login');



    //------------------------------------------------------AUTH ROUTES
    Route::middleware('auth')->group(function () {

     //------------------------------------------------------LOGOUT
     Route::post('', 'Auth\LoginController@logout')->name('logout');

     //-------------------------------------------------------INDEX
     Route::view('', 'admin.index')->name('index');


     //-------------------------------------------------------ITEMS
     Route::resource('items', ItemController::class);


    //-------------------------------------------------------COMPANY
    Route::resource('companies', CompanyController::class);

    //-------------------------------------------------------PERIOD
    Route::resource('periods', PeriodController::class);

    });
});


