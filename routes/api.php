<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// Route::get('/', function () {
//     return 'Hello World!';
// });

// Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' =>['auth:sanctum']], function () {

});


Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/',[NewsController::class,'getData']);
    Route::get('/paginate',[NewsController::class,'getPaginateData']);
    Route::post('/',[NewsController::class,'postData']);
    Route::post('/edit/{id}',[NewsController::class,'editData']);
    Route::delete('/delete/{id}',[NewsController::class,'deleteData']);
    Route::post('/logout',[AuthController::class,'logout']);
});