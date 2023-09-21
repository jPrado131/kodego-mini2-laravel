<?php

use App\Http\Controllers\AuthenticationApiController;
use App\Http\Controllers\JokesApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::middleware('auth:sanctum')->group(function () {

    Route::get('/users', [AuthenticationApiController::class, 'index']);
    Route::get('/users/{user}', [AuthenticationApiController::class, 'show']);
    Route::post('/register', [AuthenticationApiController::class, 'store']);
    Route::delete('/users/{user}', [AuthenticationApiController::class, 'destroy']);
    Route::patch('/users/{user}', [AuthenticationApiController::class, 'update']);


    Route::get('/jokes', [JokesApiController::class, 'index']);
    Route::get('/jokes/{joke}', [JokesApiController::class, 'show']);
    Route::get('/myjokes/{user}', [JokesApiController::class, 'show_my_jokes']);
    Route::post('/jokes', [JokesApiController::class, 'store']);


    Route::post('/logout', [AuthenticationApiController::class, 'logout']);
});


Route::post('/login', [AuthenticationApiController::class, 'login']);
