<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AllocationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SetCurrentSessionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth']], function () {

    Route::resource('instructors', InstructorController::class)->except('show');

    Route::resource('courses', CourseController::class);

    Route::resource('enrollments', EnrollmentController::class)->except('show');

    Route::resource('lessons', LessonController::class);

    Route::resource('modules', ModuleController::class);

    Route::resource('sessions', SessionController::class);

    Route::resource('allocations', AllocationController::class);

    Route::resource('departments', DepartmentController::class);

    Route::get('sessions/{session}/current', SetCurrentSessionController::class)->name('sessions.current');

    Route::resource('roles', RoleController::class);

    Route::resource('users', UserController::class);

});

require __DIR__.'/auth.php';
        