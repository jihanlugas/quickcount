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


Route::get('/pilkada', 'AdminController@pilkada')->name('pilkada');
Route::get('/pilkada/create', 'AdminController@create')->name('createpilkada');
Route::post('/pilkada', 'AdminController@postpilkada');
Route::get('/user', 'AdminController@user')->name('user');
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



