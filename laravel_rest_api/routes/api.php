<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;


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

Route::get('product',[AnimeController::class,'getAnime']);

Route::get('product/{id}',[AnimeController::class,'getAnimeById']);

Route::post('addAnime',[AnimeController::class,'addAnime']);

Route::patch('updateAnime/{id}',[AnimeController::class,'updateAnime']);

Route::delete('deleteAnime/{id}',[AnimeController::class,'deleteAnime']);

