<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesseurController;
Route::get('/professeurs', [ProfesseurController::class, 'index']);
Route::post('professeurs/create', [ProfesseurController::class, 'store']);
Route::put('professeurs/edit/{id}', [ProfesseurController::class, 'update']);
Route::delete('professeurs/{professeur}', [ProfesseurController::class, 'delete']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
