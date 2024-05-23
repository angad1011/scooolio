<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BoardsController;
use App\Http\Controllers\MediumsController;
use App\Http\Controllers\StreamsController;
use App\Http\Controllers\InstituteTypeController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\InstitutesController;
use App\Http\Controllers\LearnSpaceController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherActivationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\InstituteTimingController;
use App\Http\Controllers\ClassTimeTableController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\NoticeController;
use App\Http\Middleware\Authenticate;


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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([Authenticate::class])->group(function () {

Route::get('/dashboard', [DashboardsController::class, 'index'])->name('dashboards.index');
/*Role Route*/
Route::resource('roles', RolesController::class);

/*Notice Route*/ 
Route::resource('notices', NoticeController::class);

/*Branche Route*/
Route::resource('boards', BoardsController::class);

/*Meduim Route*/
Route::resource('mediums', MediumsController::class);

/*Stream Route*/
Route::resource('streams', StreamsController::class);

/*Institute Type Route*/
Route::resource('institute_types', InstituteTypeController::class);

/*Department*/
Route::resource('departments', DepartmentsController::class);

/*Division*/
Route::resource('divisions', DivisionController::class);

/*Standart*/
Route::resource('standards', StandardController::class);

/*Users*/
Route::resource('users', UsersController::class);
Route::get('/change_password', [UsersController::class,'change_password'])->name('change_password');
Route::post('/update_password', [UsersController::class,'update_password'])->name('update_password');
Route::get('/institute_user/{id}', [UsersController::class,'institute_user'])->name('institute_user');

/*institutes Route*/
Route::resource('institutes', InstitutesController::class);
Route::get('/schools', [InstitutesController::class,'index'])->name('schools');
Route::get('/colleges', [InstitutesController::class,'colleges'])->name('colleges');
Route::get('/add_college', [InstitutesController::class,'add_college'])->name('add_college');
Route::post('/college_store', [InstitutesController::class,'college_store'])->name('college_store');

/* Setup Class */
Route::resource('learn_spaces', LearnSpaceController::class);

/* Subjec Routes */
Route::resource('subjects', SubjectController::class);

/* Teacher Routes */
Route::resource('teachers', TeacherController::class);
Route::get('/teachers/time_table/{id}', [TeacherController::class,'timeTable'])->name('teachers.time_table');
Route::get('/teachers/activations/{id}', [TeacherController::class,'activation'])->name('teachers.activation');


/*Teacher Activations*/ 
Route::resource('teacher_activations', TeacherActivationController::class);


/* Student Routes */
Route::resource('students', StudentController::class);
Route::post('/import-students',[ StudentController::class,'importStudents'])->name('import.students');



/* Institute Time Management */ 
Route::resource('institute_timings', InstituteTimingController::class);
Route::get('/institute_timings/detail/{id}', [InstituteTimingController::class,'add'])->name('institute_timings.detail');

/*Class Time Table*/ 
Route::resource('time_tables', ClassTimeTableController::class);
Route::get('/time_tables/add/{id}', [ClassTimeTableController::class,'add'])->name('time_tables.add');
Route::get('/filter', [ClassTimeTableController::class,'filter'])->name('filter');


/*Academi Year Master*/ 
Route::resource('academic_years', AcademicYearController::class);

/*Class Student Setup*/ 
Route::resource('class_students', StudentClassController::class);
Route::get('/class_students/index/{id}', [StudentClassController::class,'index'])->name('class_students.index');
Route::get('/class_students/add/{id}', [StudentClassController::class,'add'])->name('class_students.add');

/*Student Attandace*/ 
Route::resource('student_attendances', StudentAttendanceController::class);
Route::get('/student_attendances/{id}/index/{date}', [StudentAttendanceController::class,'index'])->name('student_attendances.index');
Route::get('/student_attendances/attendence_details/{id}', [StudentAttendanceController::class,'attendence_details'])->name('student_attendances.attendence_details');
Route::get('/attendance_calender', [StudentAttendanceController::class,'attendance_calender'])->name('attendance_calender');
Route::get('/student_calender', [StudentAttendanceController::class,'student_calender'])->name('student_calender');

});

Route::get('/', function () {return view('auth.login');});
