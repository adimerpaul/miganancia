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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('/register',[\App\Http\Controllers\UserController::class,'register']);
Route::post('/login',[\App\Http\Controllers\UserController::class,'login']);
Route::post('/upload', [\App\Http\Controllers\UploadController::class,'upload']);

Route::group(['middleware'=>'auth:sanctum'],function (){
    Route::post('/me', [\App\Http\Controllers\UserController::class,'me']);
    Route::post('/logout', [\App\Http\Controllers\UserController::class,'logout']);
    Route::resource('/negocio',\App\Http\Controllers\NegocioController::class);
    Route::resource('/user',\App\Http\Controllers\UserController::class);
    Route::resource('/categoria',\App\Http\Controllers\CategoriaController::class);
    Route::resource('/producto',\App\Http\Controllers\ProductoController::class);
});
