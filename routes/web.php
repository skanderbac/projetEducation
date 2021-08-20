<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/students',[\App\Http\Controllers\StudentController::class,"index"])->name("students");
Route::get('/students/create',[\App\Http\Controllers\StudentController::class,"create"])->name("students.create");
Route::post('/students/create',[\App\Http\Controllers\StudentController::class,"store"])->name("students.store");
Route::get('/students/update/{student}',[\App\Http\Controllers\StudentController::class,"edit"])->name("students.edit");
Route::put('/students/update/{student}',[\App\Http\Controllers\StudentController::class,"update"])->name("students.update");
Route::delete('/students/delete/{student}',[\App\Http\Controllers\StudentController::class,"destroy"])->name("students.delete");
//Route::resource('students','App\Http\Controllers\StudentController');
