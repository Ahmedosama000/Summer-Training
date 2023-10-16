<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TeacherController;

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


Auth::routes();

Route::get('/home', [TeacherController::class, 'index'])->name('home');
Route::get('/', [TeacherController::class, 'index'])->name('home1');

Route::group(['prefix' => 'students'],function(){
    Route::get('/', [TeacherController::class, 'show'])->name('students');
    Route::get('/active', [TeacherController::class, 'active'])->name('active');
    Route::get('/not-active', [TeacherController::class, 'notActive'])->name('notActive');
    Route::patch('/activation/{id}', [TeacherController::class, 'activation'])->name('activation');
    Route::patch('/disable/{id}', [TeacherController::class, 'disable'])->name('disable');
    Route::view('/create', 'Teacher.create')->name('create');
    Route::post('/store', [TeacherController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [TeacherController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [TeacherController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [TeacherController::class, 'delete'])->name('delete');

});