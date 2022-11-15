<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\testController;
use Illuminate\Support\Facades\Route;


Route::get('/', [Controller::class, 'index']);
Route::any('/teacher', [TeachersController::class, 'index'])-> name('teacher.index');
// thêm giáo viên
Route::get('/teacher/create', [TeachersController::class, 'create'])-> name('teacher.create');
Route::post('/teacher/add', [TeachersController::class, 'store'])-> name('teacher.add');

Route::get('search', [TeachersController::class,'searchByName'])-> name('teacher.searchByName');

// test
Route::get('test', [testController::class,'test'])-> name('test');
