<?php

use App\Http\Controllers\api\ActorsController;
use App\Http\Controllers\api\CreatorsController;
use App\Http\Controllers\api\DirectorsController;
use App\Http\Controllers\api\GenresController;
use App\Http\Controllers\api\MoviesController;
use App\Http\Controllers\api\SeriesController;
use App\Http\Controllers\api\WritersController;
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

// GET All Routes

Route::get('/movies', [MoviesController::class, 'index']);
Route::get('/series', [SeriesController::class, 'index']);
Route::get('/actors', [ActorsController::class, 'index']);
Route::get('/directors', [DirectorsController::class, 'index']);
Route::get('/creators', [CreatorsController::class, 'index']);
Route::get('/writers', [WritersController::class, 'index']);
Route::get('/genres', [GenresController::class, 'index']);

// POST Routes

Route::post('/movies', [MoviesController::class, 'store']);
Route::post('/series', [SeriesController::class, 'store']);
Route::post('/actors', [ActorsController::class, 'store']);
Route::post('/directors', [DirectorsController::class, 'store']);
Route::post('/creators', [CreatorsController::class, 'store']);
Route::post('/writers', [WritersController::class, 'store']);
Route::post('/genres', [GenresController::class, 'store']);

// GET By ID Routes

Route::get('/movies/{id}', [MoviesController::class, 'show']);
Route::get('/series/{id}', [SeriesController::class, 'show']);
Route::get('/actors/{id}', [ActorsController::class, 'show']);
Route::get('/directors/{id}', [DirectorsController::class, 'show']);
Route::get('/creators/{id}', [CreatorsController::class, 'show']);
Route::get('/writers/{id}', [WritersController::class, 'show']);
Route::get('/genres/{id}', [GenresController::class, 'show']);

// PUT Update Routes

Route::put('/movies/{id}', [MoviesController::class, 'update']);
Route::put('/series/{id}', [SeriesController::class, 'update']);
Route::put('/actors/{id}', [ActorsController::class, 'update']);
Route::put('/directors/{id}', [DirectorsController::class, 'update']);
Route::put('/creators/{id}', [CreatorsController::class, 'update']);
Route::put('/writers/{id}', [WritersController::class, 'update']);
Route::put('/genres/{id}', [GenresController::class, 'update']);

// DELETE Routes

Route::delete('/movies/{id}', [MoviesController::class, 'destroy']);
Route::delete('/series/{id}', [SeriesController::class, 'destroy']);
Route::delete('/actors/{id}', [ActorsController::class, 'destroy']);
Route::delete('/directors/{id}', [DirectorsController::class, 'destroy']);
Route::delete('/creators/{id}', [CreatorsController::class, 'destroy']);
Route::delete('/writers/{id}', [WritersController::class, 'destroy']);
Route::delete('/genres/{id}', [GenresController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
