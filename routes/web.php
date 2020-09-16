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
    Route::get('{pemilu}/edit', 'PemiluController@edit')->name('pemilu.edit');
    Route::put('{pemilu}', 'PemiluController@update')->name('pemilu.update');
    Route::delete('{pemilu}', 'PemiluController@destroy')->name('pemilu.destroy');

    Route::group(['prefix' => '{pemilu}/candidate'], function () {
        Route::get('', 'CandidateController@index')->name('candidate.index');
        Route::get('create', 'CandidateController@create')->name('candidate.create');
        Route::post('', 'CandidateController@store')->name('candidate.store');
        Route::get('{candidate}/edit', 'CandidateController@edit')->name('candidate.edit');
        Route::put('{candidate}', 'CandidateController@update')->name('candidate.update');
        Route::delete('{candidate}', 'CandidateController@destroy')->name('candidate.destroy');
    });

//    Route::group(['prefix' => '{pemilu}/tps'], function () {
//        Route::get('', 'TpsController@index')->name('tps');
//        Route::get('create', 'TpsController@create')->name('tps.create');
//        Route::post('', 'TpsController@store')->name('tps.store');
//        Route::get('{tps}/edit', 'TpsController@edit')->name('tps.edit');
//        Route::put('{tps}', 'TpsController@update')->name('tps.update');
//        Route::delete('{tps}', 'TpsController@destroy')->name('tps.destroy');
//    });
});

Route::group(['prefix' => 'user'], function () {
    Route::get('', 'UserController@index')->name('user.index');
    Route::get('create', 'UserController@create')->name('user.create');
    Route::post('', 'UserController@store')->name('user.store');
    Route::get('{user}/edit', 'UserController@edit')->name('user.edit');
    Route::put('{user}', 'UserController@update')->name('user.update');
    Route::delete('{user}', 'UserController@destroy')->name('user.destroy');
});

Route::group(['prefix' => 'tps'], function () {
    Route::get('', 'TpsController@index')->name('tps.index');
    Route::get('create', 'TpsController@create')->name('tps.create');
    Route::post('', 'TpsController@store')->name('tps.store');
    Route::get('{tps}/edit', 'TpsController@edit')->name('tps.edit');
    Route::put('{tps}', 'TpsController@update')->name('tps.update');
    Route::delete('{tps}', 'TpsController@destroy')->name('tps.destroy');
});

Route::group(['prefix' => 'ajax'], function () {
    Route::post('getvillages', 'AjaxController@getvillages')->name('ajax.getvillages');
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



