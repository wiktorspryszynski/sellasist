<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/pets');
Route::resource('pets', PetController::class);
