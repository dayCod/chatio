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

// Authentication Purposes
Route::get('/auth/login', [
    'uses' => '\App\Http\Controllers\AuthController@loginView',
    'as' => 'auth.login',
    'middleware' => ['guest'],
]);

Route::post('/auth/login', [
    'uses' => '\App\Http\Controllers\AuthController@authenticate',
    'as' => 'auth.authenticate',
    'middleware' => ['guest'],
]);

Route::get('/auth/register', [
    'uses' => '\App\Http\Controllers\AuthController@registerView',
    'as' => 'auth.register',
    'middleware' => ['guest'],
]);

Route::post('/auth/register', [
    'uses' =>  '\App\Http\Controllers\AuthController@registerUser',
    'as' => 'auth.register-user',
    'middleware' => ['guest'],
]);

Route::post('/auth/logout', [
    'uses' => '\App\Http\Controllers\AuthController@logoutUser',
    'as' => 'auth.logout',
    'middleware' => ['auth'],
]);

// End of Authentication


Route::get('/chatio', [
    'uses' => '\App\Http\Controllers\ChatioController@room',
    'as' => 'chatio.room',
    'middleware' => ['auth'],
]); 




