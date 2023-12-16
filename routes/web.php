<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AllocationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\InstructorAllocationController;
use App\Http\Controllers\LearningMaterialController;
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
    return redirect()->route('login');
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

    Route::get('instructors/allocations', [InstructorAllocationController::class, 'allocatedCourses'])->name('instructors.allocations');
    Route::get('instructors/allocations/{allocation}', [InstructorAllocationController::class, 'allocatedDetails'])->name('instructors.allocation-details');

    // Route::get('instructors/allocations', [InstructorAllocationController::class, 'allocatedCourses'])->name('instructors.allocations');
    
    Route::get('instructors/{user_id}', [InstructorController::class,'show'])->name('instructors.show');

    // Route::get('students/enrollment/{student_id}', \App\Http\Controllers\StudentEnrollmentController::class)->name('students.enrollment');

    Route::controller(\App\Http\Controllers\StudentController::class)->group(function () {
        Route::get('students', 'index')->name('students.index');
        Route::get('students/{user_id}', 'show')->name('students.show');
        Route::get('students/{student}/edit', 'edit')->name('students.edit');
        Route::put('students/{user_id}', 'update')->name('students.update');
    });

    Route::controller(\App\Http\Controllers\StudentEnrollmentController::class)->group(function () {
        Route::get('students/enrollment/courses', 'getCourses')->name('students.enrollment.courses');
        Route::get('students/enrolled/courses', 'enrolledCourses')->name('students.enrolled.courses');
        Route::get('students/{student}/enroll', 'enrollmentForm')->name('students.enroll.form');
        Route::post('student-enrollment/{student}', 'enroll')->name('students.enroll');
    });

    

    Route::middleware(['can:access-admin-area'])->group(function () {
        Route::resource('departments', DepartmentController::class);
        Route::resource('modules', ModuleController::class);

        Route::resource('sessions', SessionController::class);

        Route::resource('allocations', AllocationController::class);
        Route::get('sessions/{session}/current', SetCurrentSessionController::class)->name('sessions.current');

        Route::resource('roles', RoleController::class);

        Route::resource('users', UserController::class);

        Route::resource('courses', CourseController::class);

        
    });

    Route::resource('enrollments', EnrollmentController::class)->except('show');

    Route::resource('lessons', LessonController::class);

    Route::resource('learning-materials', LearningMaterialController::class)->only(['index','create', 'store', 'edit', 'update', 'destroy']);


    
    // Route::get('/instructors/{instructor}/allocations', 'InstructorController@allocations')->name('instructor.allocations');

});

require __DIR__.'/auth.php';
        