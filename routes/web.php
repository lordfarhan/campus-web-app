<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

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

Route::get('/', function () {
    return view('home');
})->name('home');
Route::resource('courses', 'App\Http\Controllers\CourseController');
// Route::get('/courses', [CourseController::class, 'index'])->name('courses');
// Route::get('/courses/add', [CourseController::class, 'create'])->name('courses.add');
// Route::get('/courses/edit/{courseId}', [CourseController::class, 'edit'])->name('courses.edit');
