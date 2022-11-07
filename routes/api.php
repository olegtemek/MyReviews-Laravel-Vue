<?php

use App\Http\Controllers\api\ReviewController;
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



Route::controller(ReviewController::class)->group(function () {
    Route::get('/get-names', 'getNames');
    Route::get('/get-review', 'getReview');
});
