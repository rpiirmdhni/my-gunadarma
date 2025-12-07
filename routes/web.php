<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\DigibooksController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
})->name('landingpage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/my/account', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/my/account', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/my/account', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/todolist', [TodosController::class, 'index'])->name('todolist');
    Route::post('/todolist', [TodosController::class, 'store'])->name('todolist.store');
    Route::put('/todolist/{id}', [TodosController::class, 'update'])->name('todolist.update');
    Route::delete('/todolist/{id}', [TodosController::class, 'destroy'])->name('todolist.destroy');

    Route::get('/e-library', [DigibooksController::class, 'index'])->name('elib.index');

    Route::get('/attendance/scan', function() {
        if (Auth::user()->role != 3) {
            return abort(404);
        }
        return view('attendances.scan');
    })->name('attendances.scanner');
    Route::get('/attendance/{uuid}', [AttendanceController::class, 'update'])->name('attendances.update');

    Route::get('/lecturer/attendance/manage', [AttendanceController::class, 'index'])->name('attendances.manage');
    Route::post('/lecturer/attendance/store', [AttendanceController::class, 'store'])->name('attendances.store');
    Route::delete('/lecturer/attendance/{uuid}', [AttendanceController::class, 'destroy'])->name('attendances.destroy');

    Route::get('/manage/courses', [AdminController::class, 'indexManageCourse'])->name('admin.manage.courses');
    Route::post('/manage/courses',[AdminController::class, 'storeManageCourse'])->name('admin.manage.courses.store');
    Route::put('/manage/courses/{id}', [AdminController::class, 'updateManageCourse'])->name('admin.manage.courses.update');
    Route::delete('/manage/courses/{id}', [AdminController::class, 'destroyManageCourse'])->name('admin.manage.courses.destroy');

    Route::get('/manage/course-schedule', [AdminController::class, 'indexManageCourseSchedule'])->name('admin.manage.courseschedule');
    Route::post('/manage/course-schedule',[AdminController::class, 'storeManageCourseSchedule'])->name('admin.manage.courseschedule.store');
    Route::put('/manage/course-schedule/{id}', [AdminController::class, 'updateManageCourseSchedule'])->name('admin.manage.courseschedule.update');
    Route::delete('/manage/course-schedule/{id}', [AdminController::class, 'destroyManageCourseSchedule'])->name('admin.manage.courseschedule.destroy');

    Route::get('/manage/majors', [AdminController::class, 'indexManageMajors'])->name('admin.manage.majors');
    Route::post('/manage/majors',[AdminController::class, 'storeManageMajors'])->name('admin.manage.majors.store');
    Route::put('/manage/majors/{id}', [AdminController::class, 'updateManageMajors'])->name('admin.manage.majors.update');
    Route::delete('/manage/majors/{id}', [AdminController::class, 'destroyManageMajors'])->name('admin.manage.majors.destroy');

    Route::get('/manage/classrooms', [AdminController::class, 'indexManageClassroom'])->name('admin.manage.classrooms');
    Route::post('/manage/classrooms',[AdminController::class, 'storeManageClassroom'])->name('admin.manage.classrooms.store');
    Route::put('/manage/classrooms/{id}', [AdminController::class, 'updateManageClassroom'])->name('admin.manage.classrooms.update');
    Route::delete('/manage/classrooms/{id}', [AdminController::class, 'destroyManageClassroom'])->name('admin.manage.classrooms.destroy');

    Route::get('/manage/students', [AdminController::class, 'indexManageStudent'])->name('admin.manage.students');
    Route::post('/manage/students',[AdminController::class, 'storeManageStudent'])->name('admin.manage.students.store');
    Route::put('/manage/students/{id}', [AdminController::class, 'updateManageStudent'])->name('admin.manage.students.update');
    Route::delete('/manage/students/{id}', [AdminController::class, 'destroyManageStudent'])->name('admin.manage.students.destroy');

    Route::get('/manage/lecturers', [AdminController::class, 'indexManageLecturer'])->name('admin.manage.lecturers');
    Route::post('/manage/lecturers',[AdminController::class, 'storeManageLecturer'])->name('admin.manage.lecturers.store');
    Route::put('/manage/lecturers/{id}', [AdminController::class, 'updateManageLecturer'])->name('admin.manage.lecturers.update');
    Route::delete('/manage/lecturers/{id}', [AdminController::class, 'destroyManageLecturer'])->name('admin.manage.lecturers.destroy');

    Route::get('/manage/employees', [AdminController::class, 'indexManageEmployee'])->name('admin.manage.employees');
    Route::post('/manage/employees',[AdminController::class, 'storeManageEmployee'])->name('admin.manage.employees.store');
    Route::put('/manage/employees/{id}', [AdminController::class, 'updateManageEmployee'])->name('admin.manage.employees.update');
    Route::delete('/manage/employees/{id}', [AdminController::class, 'destroyManageEmployee'])->name('admin.manage.employees.destroy');

    Route::get('/manage/users', [AdminController::class, 'indexManageUser'])->name('admin.manage.users');
    Route::post('/manage/users',[AdminController::class, 'storeManageUser'])->name('admin.manage.users.store');
    Route::put('/manage/users/{id}', [AdminController::class, 'updateManageUser'])->name('admin.manage.users.update');
    Route::delete('/manage/users/{id}', [AdminController::class, 'destroyManageUser'])->name('admin.manage.users.destroy');
});

require __DIR__.'/auth.php';
