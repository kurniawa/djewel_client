<?php

use App\Http\Controllers\LoginController;
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
    // return view('welcome');
    return view('app');
})->middleware('auth');

Route::controller(LoginController::class)->group(function ()
{
    Route::get('/login','login')->name('login')->middleware('guest');
    Route::post('/login/authenticate','authenticate')->name('login.authenticate')->middleware('guest');
    Route::post('/logout','logout')->name('logout')->middleware('auth');
});
