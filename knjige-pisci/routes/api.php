<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\WriterController;
use App\Http\Resources\BookResource;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use App\Models\Writer;
use GuzzleHttp\Middleware;
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



//Route::get('/writers',[WriterController::class,'index']);
//Route::get('/writers/{id}',[WriterController::class,'show']);
//Route::resource('writers',WriterController::class);
//Route::resource('books',BookController::class);
//Route::resource('genres',GenreController::class);
//Route::resource('books',BookController::class);



Route::resource('genres',GenreController::class);
Route::resource('/writers',WriterController::class);
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::resource('/books',BookController::class)->only(['show']);

Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::resource('books',BookController::class)->only(['update','store','destroy']);
    Route::post('/logout',[AuthController::class,'logout']);
});
