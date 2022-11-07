<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\IndexController;
use App\Http\Controllers\admin\ReviewController;
use App\Models\Review;
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


Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/review', ReviewController::class);
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginRequest')->name('login.post');
});


Route::get('/{vue_capture?}', function () {
    return view('main');
})->where('vue_capture', '[\/\w\.-]*');
