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

Route::get('/posts', 'App\Http\Controllers\PostController@index');
Route::get('/hobby', 'App\Http\Controllers\HobbyController@index');
Route::get('/pets', 'App\Http\Controllers\PetController@index');
Route::get('/city', 'App\Http\Controllers\CityController@index');
