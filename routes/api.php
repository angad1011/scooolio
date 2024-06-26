<?php
// dd('test');
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppScreenController;

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
    Route::get('/today_time_table',  [TeacherController::class, 'current_day_timeTable']);
    Route::get('/class_details',  [TeacherController::class, 'class_details']);
    Route::get('/week_day_list',  [TeacherController::class, 'weekdays']);
    Route::get('/attendance_types',  [TeacherController::class, 'attendance_types']);
    
    Route::post('/attendance_store',  [StudentAttendanceController::class, 'attendance_store']);
    Route::post('/attendances/confirm', [StudentAttendanceController::class, 'confirm']);
    Route::get('/attendances/pending', [StudentAttendanceController::class, 'pendingConfirmations']);

});

Route::post("/login",[AuthController::class,'teacherLogin']);
Route::post("/forget_password_teacher",[AuthController::class,'teacherForgetPassword']);
Route::post("/screen",[AppScreenController::class,'screens']);




