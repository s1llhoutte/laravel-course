<?php

use Illuminate\Support\Facades\Route;

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
    return 'aaaaaaaaa';
});

Route::get('/my_page', 'App\Http\Controllers\MyPageController@index');

Route::get('/my_city', 'App\Http\Controllers\MyCityController@city');

Route::get('/my_hobby', 'App\Http\Controllers\MyHobbyController@hobby');

Route::get('/my_pets', 'App\Http\Controllers\MyPetsController@pets');
