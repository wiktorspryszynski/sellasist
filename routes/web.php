<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/pets');
Route::get('pets/search', [PetController::class, 'search']);
Route::resource('pets', PetController::class);
