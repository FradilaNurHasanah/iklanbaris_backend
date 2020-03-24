<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

// Route::middleware(['jwt.verify'])->group(function(){
//     Route::get('barang', 'BarangController');
//     ROute::get('barangall', 'BarangController@barangAuth');
//     Route::get('user', 'UserController@getAuthenticatedUser');
// });
