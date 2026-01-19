<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LearnWorldsController;

Route::get('/users', [LearnWorldsController::class, 'getUsers']);

Route::get('/', function () {
    return view('welcome');
});