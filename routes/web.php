<?php

use App\Http\Controllers\AccessibilityPlanController;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('signin');
Route::post('/login/logout', [LoginController::class, 'logout'])->name('signout');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/add', [UserController::class, 'add'])->name('users.add');
Route::post('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/update/{user}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/delete/{user}', [UserController::class, 'delete'])->name('users.delete');

Route::prefix('courses')->group(function () {
    Route::get('/',[CourseController::class, 'index'])->name('courses.index');
    Route::get('/add', [CourseController::class, 'add'])->name('courses.add');
    Route::post('/create', [CourseController::class, 'create'])->name('courses.create');
    Route::get('/edit/{course}', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/update/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::get('/delete/{course}', [CourseController::class, 'delete'])->name('courses.delete');
});

Route::prefix('subjects')->group(function () {
    Route::get('/{course}',[SubjectController::class, 'index'])->name('subjects.index');
    Route::get('/add', [SubjectController::class, 'add'])->name('subjects.add');
    Route::get('/multiple/{course}', [SubjectController::class, 'multiple'])->name('subjects.multiple');
    Route::post('/create', [SubjectController::class, 'create'])->name('subjects.create');
    Route::get('/edit/{subject}', [SubjectController::class, 'edit'])->name('subjects.edit');
    Route::put('/update/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
    Route::get('/delete/{subject}', [SubjectController::class, 'delete'])->name('subjects.delete');
    Route::get('/fetch/courses', [SubjectController::class, 'courses'])->name('subjects.courses');
    Route::post('/multipleCreate', [SubjectController::class, 'multipleCreate'])->name('multiple.create');
    Route::get('/generateReport', [SubjectController::class, 'generateReport'])->name('subjects.report');
});

Route::prefix('students')->group(function () {
    Route::get('/',[StudentController::class, 'index'])->name('students.index');
    Route::get('/add', [StudentController::class, 'add'])->name('students.add');
    Route::post('/create', [StudentController::class, 'create'])->name('students.create');
    Route::get('/edit/{student}', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/update/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::get('/delete/{student}', [StudentController::class, 'delete'])->name('students.delete');
});

Route::prefix('case.studies')->group(function () {
    Route::get('/',[CaseStudyController::class, 'index'])->name('case.studies.index');
    Route::get('/add', [CaseStudyController::class, 'add'])->name('case.studies.add');
    Route::post('/create', [CaseStudyController::class, 'create'])->name('case.studies.create');
    Route::get('/edit/{case}', [CaseStudyController::class, 'edit'])->name('case.studies.edit');
    Route::put('/update/{case}', [CaseStudyController::class, 'update'])->name('case.studies.update');
    Route::get('/delete/{case}', [CaseStudyController::class, 'delete'])->name('case.studies.delete');
});

Route::prefix('semesters')->group(function () {
    Route::get('/',[SemesterController::class, 'index'])->name('semesters.index');
    Route::get('/add', [SemesterController::class, 'add'])->name('semesters.add');
    Route::post('/create', [SemesterController::class, 'create'])->name('semesters.create');
    Route::get('/edit/{semester}', [SemesterController::class, 'edit'])->name('semesters.edit');
    Route::put('/update/{semester}', [SemesterController::class, 'update'])->name('semesters.update');
    Route::get('/delete/{semester}', [SemesterController::class, 'delete'])->name('semesters.delete');
    Route::get('/subjects/{semester}', [SemesterController::class, 'subjects'])->name('semesters.subjects');
    Route::put('/subjects/store/{semester}', [SemesterController::class, 'store'])->name('semesters.subjects.store');
});

Route::prefix('salas')->group(function () {
    Route::get('/{student}',[ClassRoomController::class, 'index'])->name('class.rooms.index');
    Route::get('/adicionar/{student}', [ClassRoomController::class, 'add'])->name('class.rooms.add');
    Route::post('/criar', [ClassRoomController::class, 'create'])->name('class.rooms.create');
    Route::get('/editar/{classRoom}/{student}', [ClassRoomController::class, 'edit'])->name('class.rooms.edit');
    Route::put('/atualizar/{classRoom}', [ClassRoomController::class, 'update'])->name('class.rooms.update');
    Route::get('/excluir/{classRoom}', [ClassRoomController::class, 'delete'])->name('class.rooms.delete');
});

Route::prefix('planos')->group(function () {
    Route::get('/{student}',[AccessibilityPlanController::class, 'index'])->name('accessibility.plans.index');
    Route::get('/adicionar/{student}', [AccessibilityPlanController::class, 'add'])->name('accessibility.plans.add');
    Route::post('/criar', [AccessibilityPlanController::class, 'create'])->name('accessibility.plans.create');
    Route::get('/editar/{accessibilityPlan}/{student}', [AccessibilityPlanController::class, 'edit'])->name('accessibility.plans.edit');
    Route::put('/atualizar/{accessibilityPlan}', [AccessibilityPlanController::class, 'update'])->name('accessibility.plans.update');
    Route::get('/excluir/{accessibilityPlan}', [AccessibilityPlanController::class, 'delete'])->name('accessibility.plans.delete');
    Route::get('/gerarRelatorio/{accessibilityPlan}', [AccessibilityPlanController::class, 'generateReport'])->name('accessibility.plans.report');
});

Route::prefix('acompanhamentos')->group(function () {
    Route::get('/{student}',[FollowController::class, 'index'])->name('follows.index');
    Route::get('/adicionar/{student}', [FollowController::class, 'add'])->name('follows.add');
    Route::post('/criar', [FollowController::class, 'create'])->name('follows.create');
    Route::get('/editar/{follow}/{student}', [FollowController::class, 'edit'])->name('follows.edit');
    Route::put('/atualizar/{follow}', [FollowController::class, 'update'])->name('follows.update');
    Route::get('/excluir/{follow}', [FollowController::class, 'delete'])->name('follows.delete');
    Route::get('/gerarRelatorio/{follow}', [FollowController::class, 'generateReport'])->name('follows.report');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [HomeController::class, 'index'])->name('profile');
Route::get('/about', [HomeController::class, 'index'])->name('profile');
