<?php
// dd('test');
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/subjects_list',  [SubjectController::class, 'subject_listing'])->name('subjects_list');
    Route::get('/teacher_profile',  [TeacherController::class, 'teacher_profile'])->name('teacher_profile');
    Route::get('/teacher_time_table',  [TeacherController::class, 'time_table_api'])->name('teacher_time_table');
    Route::get('/week_day/{id}',  [TeacherController::class, 'teacher_day_time_table']);
});

Route::post("/login",[AuthController::class,'teacherLogin']);
Route::post("/forget_password_teacher",[AuthController::class,'teacherForgetPassword']);




