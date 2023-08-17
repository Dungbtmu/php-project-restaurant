<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    } else {
        return view('login');
    }
})->name('login');

Route::middleware('web')->group(function () {
    Route::get('/login', function () {
        if (Auth::check()) {
            return redirect()->route('home');
        } else {
            return view('login');
        }
    })->name('login');

    Route::get('/register', function () {
        if (Auth::check()) {
            return redirect()->route('home');
        } else {
            return view('register');
        }
    })->name('register');

    Route::middleware('auth')->group(function () {
        Route::get('/home', function () {
            return view('api-docs');
        })->name('dashboard');
    });
});

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home',[HomeController::class, 'home'])->name('home');
Route::get('/about',[HomeController::class, 'about'])->name('about');
Route::get('/award',[HomeController::class, 'award'])->name('award');
Route::get('/recipe',[HomeController::class, 'recipe'])->name('recipe');
Route::get('/header',[HomeController::class, 'header'])->name('header');
Route::get('/footer',[HomeController::class, 'footer'])->name('footer');

Route::get('/meal',[MealController::class, 'meal'])->name('meal');
Route::get('/gallery',[GalleryController::class, 'gallery'])->name('gallery');
Route::get('/feedback', [FeedbackController::class, 'feedback'])->name('feedback');

//Admin
Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

Route::get('/gallery-admin',[GalleryController::class,'view'])->name('gallery.view');
Route::post('/gallery/save',[GalleryController::class,'save'])->name('gallery.save');
Route::put('/gallery/{id}',[GalleryController::class,'update'])->name('gallery.update');
Route::delete('/gallery/{id}',[GalleryController::class,'delete'])->name('gallery.delete');

Route::get('/meal-admin',[MealController::class,'view'])->name('meal.view');
Route::post('/meal/save',[MealController::class,'save'])->name('meal.save');
Route::put('/meal/{id}',[MealController::class,'update'])->name('meal.update');
Route::delete('/meal/{id}',[MealController::class,'delete'])->name('meal.delete');
Route::get('/meal/{meal_name}', [MealController::class, 'showMealWithGalleryDetails'])->name('meal.showGalleryDetails');


Route::get('/feedback-admin',[FeedbackController::class,'view'])->name('feedback.view');
Route::post('/feedback/save',[FeedbackController::class,'save'])->name('save.feedback');
Route::delete('/feedback/{id}',[FeedbackController::class,'delete'])->name('feedback.delete');

Route::get('/manage', [ManageController::class, 'index'])->name('manage');
Route::post('/manage/search', [ManageController::class, 'search'])->name('search');
Route::get('/delete/user/{id}', [ManageController::class, 'delete'])->name('delete.user');
Route::post('/manage/update-user/{id}', [ManageController::class, 'update'])->name('update.save');