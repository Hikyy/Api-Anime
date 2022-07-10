<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;
use App\Models\Product;

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

Route::get('Anime/{id}',[AnimeController::class,'getAnimeByIdView']);

Route::get('/', function () {
    return 'coucou';
});

Route::get('file', function () {
    return view('form');
});

Route::get('product',[AnimeController::class,'getAnime']);

Route::get('product/{id}', [AnimeController::class,'bar']);

Route::post('save', function(){
Product::create([
    'title' => request('title'),
    'Synopsis' => request('Synopsis'),
    'Score' => request('Score'),
    'title' => request('title'),
    'Image' => request('Image'),
]);
    return redirect('file');
/* $data = new Product();
$data->title = request('title');
$data->Synopsis = request('Synopsis');
$data->Score = request('Score');
$data->Image = "blabla";
$data->save(); */

});

