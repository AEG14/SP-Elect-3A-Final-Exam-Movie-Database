<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\ActorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/movies', [MovieController::class, 'displayAllMovies']);
Route::get('/movies/{id}', [MovieController::class, 'viewSpecificMovie']);
Route::get('/directors/{id}', [DirectorController::class, 'viewSpecificDirector']);
Route::get('/actors/{id}', [ActorController::class, 'viewSpecificActor']);
Route::get('/movies-with-genres', [MovieController::class, 'viewMoviesWithGenres']);
Route::get('/movies-by-genre/{gen_title}', [MovieController::class, 'viewMoviesByGenreTitle']);
Route::get('/movies-with-ratings', [MovieController::class, 'viewMoviesWithRatings']);

