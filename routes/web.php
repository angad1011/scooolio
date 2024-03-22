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
use App\Http\Controllers\StudentCintroller;
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

/* Student Routes */
Route::resource('students', StudentCintroller::class);


});

Route::get('/', function () {return view('auth.login');});
