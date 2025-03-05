<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProfesseurController;

Route::resource('professeurs', ProfesseurController::class);


