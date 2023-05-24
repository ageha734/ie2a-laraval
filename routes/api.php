<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Kadai10_1Controller;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('articles/v1',Kadai10_1Controller::class);

//API認証↓を追加
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('articles/v1',Kadai10_1Controller::class);
});
