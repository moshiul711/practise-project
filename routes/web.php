<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PractiseController;

Route::get('/auth/{provider}/redirect', [PractiseController::class,'redirect']);
Route::get('/auth/{provider}/callback',[PractiseController::class,'callback']);

Route::get('/',[PractiseController::class,'index'])->name('home');
