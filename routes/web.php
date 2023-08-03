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

Route::get('/my_page', function () {
    return 'this is my page';
});

Route::get('/my_city', function () {
    return 'my city is Dnipro';
});

Route::get('/my_hobby', function () {
   return 'my hooby is gym';
});

Route::get('/my_pets', function () {
    return 'my pet\'s is a Chapa';
});
