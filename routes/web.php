<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

//Routes for authentication
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
// When user will sign up, it will redirect to needed dashboard, it depends on the role .. !
Route::group(['middleware' => 'auth', 'namespace' => 'Home'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'admin','namespace' => 'Admin', 'middleware' => ['role:admin']], function() {
    Route::resource('dashboard', 'DashboardController');
});

