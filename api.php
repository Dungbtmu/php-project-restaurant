<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MealController;

Route::get('/gallery/{id}', [GalleryController::class,'show'])->name('gallery.show');
Route::get('/meal/{id}', [MealController::class,'show'])->name('meal.show');
Route::get('/meal/{meal_name}/gallery-ids',[MealController::class,'getGalleryIdsByMealName']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});