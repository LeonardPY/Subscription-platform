<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubScriberController;
use App\Http\Controllers\WebSiteController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'website'], function () {
    Route::post('/create', [WebSiteController::class, 'create']);
    Route::patch('/update/{id}', [WebSiteController::class, 'update']);
    Route::delete('/delete/{id}', [WebSiteController::class, 'delete']);
});

Route::group(['prefix' => 'post'], function () {
    Route::post('/create', [PostController::class, 'create']);
    Route::patch('/update/{id}', [PostController::class, 'update']);
    Route::delete('/delete/{id}', [PostController::class, 'delete']);
});

Route::group(['prefix' => 'subscriber'], function () {
    Route::post('/create', [SubScriberController::class, 'create']);
    Route::delete('/delete/{id}', [SubScriberController::class, 'delete']);
});
