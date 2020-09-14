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


Route::get('/', 'PublicController@beranda')->name('beranda');
Route::get('/beranda', 'PublicController@beranda')->name('beranda');
Route::get('/tentang', 'PublicController@tentang')->name('tentang');
Route::get('/petunjuk', 'PublicController@petunjuk')->name('petunjuk');
Route::get('/kegiatansosial', 'PublicController@kegiatansosial')->name('kegiatansosial');
Route::get('/success', 'PublicController@success')->name('success');

Auth::routes();

Route::group(['prefix' => 'pemilu'], function () {
    Route::get('', 'PemiluController@index')->name('pemilu.index');
    Route::get('create', 'PemiluController@create')->name('pemilu.create');
    Route::post('', 'PemiluController@store')->name('pemilu.store');
    Route::get('{pemilu}', 'PemiluController@show')->name('pemilu.show');
    Route::get('{pemilu}/edit', 'PemiluController@edit')->name('pemilu.edit');
    Route::put('{pemilu}', 'PemiluController@update')->name('pemilu.update');
    Route::delete('{pemilu}', 'PemiluController@destroy')->name('pemilu.destroy');

    Route::group(['prefix' => '{pemilu}/candidate'], function () {
        Route::get('create', 'CandidateController@create')->name('candidate.create');
        Route::post('', 'CandidateController@store')->name('candidate.store');
        Route::get('{candidate}/edit', 'CandidateController@edit')->name('candidate.edit');
        Route::put('{candidate}', 'CandidateController@update')->name('candidate.update');
        Route::delete('{candidate}', 'CandidateController@destroy')->name('candidate.destroy');
    });
});

Route::group(['prefix' => 'user'], function () {
    Route::get('', 'AdminController@user')->name('user');
});


//Route::get('/registration', 'RegistrationController@registration')->name('registration');
//Route::get('/invitation', 'RegistrationController@invitation')->name('invitation');
//Route::post('/invitation', 'RegistrationController@postinvitation');
//Route::get('/upload', 'RegistrationController@upload')->name('upload');
//Route::post('/upload', 'RegistrationController@postupload');
//Route::get('/completedata', 'RegistrationController@completedata')->name('completedata');
//Route::post('/completedata', 'RegistrationController@postcompletedata');
//
//Route::get('/debug', 'RegistrationController@debug')->name('debug');
//
//Route::get('/successcompletedata', 'HomeController@successcompletedata')->name('successcompletedata');
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/request', 'Hom   eController@request')->name('request');
//Route::post('/request', 'HomeController@postrequest');
//
//Route::get('/profile', 'HomeController@profile')->name('profile');



