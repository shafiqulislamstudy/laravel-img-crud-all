<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

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





Route::post('/',[UserController::class,'login'])->name('user.login');


    Route::get('/',[StudentController::class,'index'])->name('student.addForm');
    Route::post('addstudent',[StudentController::class,'store'])->name('student.add');
    Route::get('allstudent',[StudentController::class,'show'])->name('student.show');
    Route::get('editstudent/{id}',[StudentController::class,'edit'])->name('student.edit');
    Route::post('editstudent',[StudentController::class,'update'])->name('student.update');
    Route::get('deletestudent/{id}',[StudentController::class,'destroy'])->name('student.delete');

