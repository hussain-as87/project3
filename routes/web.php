<?php

use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisteredController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

/*Route::get('/', function () {
return view('welcome');
});*/

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//static//////
//course
Route::get('/', [CourseController::class, 'index'])->name('course.home');
Route::get('/course/{course}-{slug}', [CourseController::class, 'show'])->name('course.show');
Route::any('/search', [CourseController::class, 'search'])->name('course.search');


//classification
Route::get('/classification/{classification}/view', [ClassificationController::class, 'index'])->name('class.index');
//registered
Route::get('/registered/create', [RegisteredController::class, 'create'])->name('reg.create');
Route::post('/registered', [RegisteredController::class, 'store'])->name('reg.store');

//////////////
/// control panel
/// course
Route::get('/courses/create', [CourseController::class, 'create'])->name('course.create')->middleware('auth');
Route::post('/courses', [CourseController::class, 'store'])->name('course.store')->middleware('auth');
Route::get('/courses/list', [CourseController::class, 'list'])->name('course.list')->middleware('auth');
Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('course.edit')->middleware('auth');
Route::patch('/courses/{course}', [CourseController::class, 'update'])->name('course.update')->middleware('auth');
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('course.destroy')->middleware('auth');
//classification
Route::get('/class/create', [ClassificationController::class, 'create'])->name('class.create')->middleware('auth');
Route::post('/class', [ClassificationController::class, 'store'])->name('class.store')->middleware('auth');
Route::get('/class/show', [ClassificationController::class, 'show'])->name('class.show')->middleware('auth');
Route::get('/class/{classification}/edit', [ClassificationController::class, 'edit'])->name('class.edit')->middleware('auth');
Route::patch('/class/{classification}', [ClassificationController::class, 'update'])->name('class.update')->middleware('auth');
Route::delete('/class/{classification}', [ClassificationController::class, 'destroy'])->name('class.destroy')->middleware('auth');
//registered
Route::get('/registereds/show', [RegisteredController::class, 'show'])->name('reg.show')->middleware('auth');
Route::get('/registereds/{registered}/edit', [RegisteredController::class, 'edit'])->name('reg.edit')->middleware('auth');
Route::patch('/registereds/{registered}', [RegisteredController::class, 'update'])->name('reg.update')->middleware('auth');
Route::delete('/registereds/{registered}', [RegisteredController::class, 'destroy'])->name('reg.destroy')->middleware('auth');
Route::any('/reg/search', [RegisteredController::class, 'search'])->name('reg.search');
