<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/home', function () {
//     return view('home');
// });

// Courses Route
Route::get('/courses' , [CourseController::class , 'index'])
->name('courses');
// Create New Course
Route::view('/create' , 'pages.create')->name('create');
Route::post('/store' , [CourseController::class , 'store'])
->name('store');
// Show Details
Route::get("/courses/{id}" , [CourseController::class , 'show'])
->name('details');
// Update Course
Route::get('/courses/{id}/edit' , [CourseController::class , 'edit'])
->name('edit');
Route::put('/courses/{id}' , [CourseController::class , 'update'])
->name('update');
// Delete Course
Route::delete('/courses/{id}' , [CourseController::class , 'destroy'])
->name('destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
