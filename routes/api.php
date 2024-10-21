<?php

use App\Http\Controllers\Api\VehicalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('vheicals',[VehicalController::class,'index'])->name('vehicals.index');

