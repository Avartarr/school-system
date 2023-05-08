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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dashBoard', [App\Http\Controllers\DashController::class, 'dashBoard'])->name('dashBoard');
Route::post('dash_Board', [App\Http\Controllers\DashController::class, 'dash_Board'])->name('dash_Board');
Route::patch('update/{id}', [App\Http\Controllers\DashController::class, 'update'])->name('update');
Route::get('deleted/{id}', [App\Http\Controllers\DashController::class, 'deleted'])->name('deleted');

Route::patch('chisom/{id}', [App\Http\Controllers\DashController::class, 'chisom'])->name('chisom');


Route::get('result', [App\Http\Controllers\DashController::class, 'result'])->name('result');
Route::post('result_a', [App\Http\Controllers\DashController::class, 'result_a'])->name('result_a');
Route::patch('update2/{id}', [App\Http\Controllers\DashController::class, 'update2'])->name('update2');
Route::get('delete/{id}', [App\Http\Controllers\DashController::class, 'delete'])->name('delete');

Route::get('resultb', [App\Http\Controllers\DashController::class, 'resultb'])->name('resultb');
Route::post('result_b', [App\Http\Controllers\DashController::class, 'result_b'])->name('result_b');
Route::patch('update/{id}', [App\Http\Controllers\DashController::class, 'update'])->name('update');


Route::get('studentReg', [App\Http\Controllers\RegController::class, 'studentReg'])->name('studentReg');
Route::post('student_Reg', [App\Http\Controllers\RegController::class, 'student_Reg'])->name('student_Reg');
Route::patch('update/{id}', [App\Http\Controllers\RegController::class, 'update'])->name('update');
Route::get('delete/{id}', [App\Http\Controllers\RegController::class, 'delete'])->name('delete');


Route::post('department_store', [App\Http\Controllers\RegController::class, 'department_store'])->name('department_store');
Route::post('faculty_class', [App\Http\Controllers\RegController::class, 'faculty_class'])->name('faculty_class');

Route::get('Smanagement', [App\Http\Controllers\RegController::class, 'Smanagement'])->name('Smanagement');
Route::patch('update4/{id}', [App\Http\Controllers\RegController::class, 'update4'])->name('update4');
Route::get('delete2/{id}', [App\Http\Controllers\RegController::class, 'delete2'])->name('delete2');
Route::patch('update5/{id}', [App\Http\Controllers\RegController::class, 'update5'])->name('update5');
Route::get('delete3/{id}', [App\Http\Controllers\RegController::class, 'delete3'])->name('delete3');



