<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\DashboardController@homepage')->name('homepage');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::get('/dashboard/film', 'App\Http\Controllers\Admin@filmTable')->name('dashboard/film');
    Route::get('/dashboard/proiezione', 'App\Http\Controllers\Admin@proiezTable')->name('dashboard/proiezione');
    Route::get('/dashboard/sala', 'App\Http\Controllers\Admin@salaTable')->name('dashboard/sala');
    Route::get('/dashboard/cinema', 'App\Http\Controllers\Admin@cinemaTable')->name('dashboard/cinema');
    Route::post('/addFilm', 'App\Http\Controllers\Admin@addFilm')->name('addFilm');
    Route::post('/addCinema', 'App\Http\Controllers\Admin@addCinema')->name('addCinema');
    Route::post('/addSala', 'App\Http\Controllers\Admin@addSala')->name('addSala');
    Route::post('/addProiezione', 'App\Http\Controllers\Admin@addProiezione')->name('addProiezione');
    Route::post('/removeFilm', 'App\Http\Controllers\Admin@removeFilm')->name('removeFilm');
    Route::post('/removeSala', 'App\Http\Controllers\Admin@removeSala')->name('removeSala');
    Route::post('/removeCinema', 'App\Http\Controllers\Admin@removeCinema')->name('removeCinema');
    Route::post('/removeProiezione', 'App\Http\Controllers\Admin@removeProiezione')->name('removeProiezione');
    Route::post('/updateFilm', 'App\Http\Controllers\Admin@updateFilm')->name('updateFilm');
    Route::post('/updateCinema', 'App\Http\Controllers\Admin@updateCinema')->name('updateCinema');
    Route::post('/updateSala', 'App\Http\Controllers\Admin@updateSala')->name('updateSala');
    Route::post('/updateProiezione', 'App\Http\Controllers\Admin@updateProiezione')->name('updateProiezione');
});


Route::group(['middleware' => ['auth', 'role:user']], function(){
    Route::post('/buy', 'App\Http\Controllers\User@buy')->name('buy');
    Route::post('/updateCart', 'App\Http\Controllers\User@updateCart')->name('updateCart');
    Route::post('/addCart', 'App\Http\Controllers\User@addCart')->name('addCart');
    Route::get('/carrello', 'App\Http\Controllers\User@carrello')->name('carrello');
    Route::post('/search', 'App\Http\Controllers\User@search')->name('search');
    Route::get('/film/{id}', 'App\Http\Controllers\User@film')->name('film');
    Route::get('/proiezFilm/{id}', 'App\Http\Controllers\User@proiezFilm')->name('proiezFilm');
    Route::get('/proiez', 'App\Http\Controllers\User@proiez')->name('proiez');
    Route::get('/storico', 'App\Http\Controllers\User@storico')->name('storico');
});

require __DIR__.'/auth.php';
