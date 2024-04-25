<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\backend\ExamTypeController;
use App\Http\Controllers\backend\SubjectsController;
use App\Http\Controllers\backend\StudentYearController;
use App\Http\Controllers\backend\StudentClassController;
use App\Http\Controllers\backend\StudentGroupController;
use App\Http\Controllers\backend\StudentShiftController;
use App\Http\Controllers\backend\AssignSubjectController;
use App\Http\Controllers\backend\ExamFeeController;
use GuzzleHttp\Psr7\Request;

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

require __DIR__.'/auth.php';

// Admin All Routes Start
Route::middleware(['auth', 'role:Admin'])->group(function (){

Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/update', [AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');
Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

////////////// STUDEND ALL ROUTES ////////////////////////////
Route::controller(StudentController::class)->group(function(){

    Route::get('/all/students', 'AllStudents')->name('all.students');
    Route::get('/add/student', 'AddStudent')->name('add.student');
    Route::post('/store/student', 'StoreStudent')->name('store.student');
    Route::get('/view/student/{id}', 'ViewStudent')->name('view.student');
    Route::get('/edit/student/{id}', 'EditStudent')->name('edit.student');
    Route::post('/update/student', 'UpdateStudent')->name('update.student');
    Route::get('/delete/student/{id}', 'DeleteStudent')->name('delete.student');

    // STUDENT CLASS ROUTES
    Route::get('/student/class', 'StudentClass')->name('student.class');
    
});

// STUDENT CLASS ROUTES
Route::controller(StudentClassController::class)->group(function(){
    Route::get('/student/class', 'StudentClass')->name('student.class');
    Route::get('/add/student/class', 'AddStudentClass')->name('add.student.class');
    Route::post('/store/student/class', 'StoreStudentClass')->name('store.student.class');
    Route::get('/edit/student/class/{id}', 'EditStudentClass')->name('edit.student.class');
    Route::post('/update/student/class', 'UpdateStudentClass')->name('update.student.class');
    Route::get('/delete/student/class/{id}', 'DeleteStudentClass')->name('delete.student.class');
});

// STUDENT YEAR ROUTES
Route::controller(StudentYearController::class)->group(function(){
    Route::get('/student/year', 'StudentYear')->name('student.year');
    Route::get('/add/student/year', 'AddStudentYear')->name('add.student.year');
    Route::post('/store/student/year', 'StoreStudentYear')->name('store.student.year');
    Route::get('/edit/student/year/{id}', 'EditStudentYear')->name('edit.student.year');
    Route::post('/update/student/year', 'UpdateStudentYear')->name('update.student.year');
    Route::get('/delete/student/year/{id}', 'DeleteStudentYear')->name('delete.student.year');
});

// STUDENT GROUP ROUTES
Route::controller(StudentGroupController::class)->group(function(){
    Route::get('/student/group', 'StudentGroup')->name('student.group');
    Route::get('/add/student/group', 'AddStudentGroup')->name('add.student.group');
    Route::post('/store/student/group', 'StoreStudentGroup')->name('store.student.group');
    Route::get('/edit/student/group/{id}', 'EditStudentGroup')->name('edit.student.group');
    Route::post('/update/student/group', 'UpdateStudentGroup')->name('update.student.group');
    Route::get('/delete/student/group/{id}', 'DeleteStudentGroup')->name('delete.student.group');
});


// STUDENT GROUP ROUTES
Route::controller(StudentShiftController::class)->group(function(){
    Route::get('/student/shift', 'StudentShift')->name('student.shift');
    Route::get('/add/student/shift', 'AddStudentShift')->name('add.student.shift');
    Route::post('/store/student/shift', 'StoreStudentShift')->name('store.student.shift');
    Route::get('/edit/student/shift/{id}', 'EditStudentShift')->name('edit.student.shift');
    Route::post('/update/student/shift', 'UpdateStudentShift')->name('update.student.shift');
    Route::get('/delete/student/shift/{id}', 'DeleteStudentShift')->name('delete.student.shift');
});

// EXAM TYPE GROUP ROUTES
Route::controller(ExamTypeController::class)->group(function(){
    Route::get('/exam/type', 'ExamType')->name('exam.type');
    Route::get('/add/exam/type', 'AddExamType')->name('add.exam.type');
    Route::post('/store/exam/type', 'StoreExamType')->name('store.exam.type');
    Route::get('/edit/exam/type/{id}', 'EditExamType')->name('edit.exam.type');
    Route::post('/update/exam/type', 'UpdateExamType')->name('update.exam.type');
    Route::get('/delete/exam/type/{id}', 'DeleteExamType')->name('delete.exam.type');
});

// ALL SUBJECTS GROUP ROUTES
Route::controller(SubjectsController::class)->group(function(){
    Route::get('/all/subjects', 'AllSubjects')->name('all.subjects');
    Route::get('/add/subject', 'AddSubject')->name('add.subject');
    Route::post('/store/subject', 'StoreSubject')->name('store.subject');
    Route::get('/edit/subject/{id}', 'EditSubject')->name('edit.subject');
    Route::post('/update/subject', 'UpdateSubject')->name('update.subject');
    Route::get('/delete/subject/{id}', 'DeleteSubject')->name('delete.subject');
});

// ASSIGN SUBJECTS GROUP ROUTES
Route::controller(AssignSubjectController::class)->group(function(){
    Route::get('/assign/subject', 'AssignSubject')->name('assign.subject');
    Route::get('/add/assign/subject', 'AddAssignSubject')->name('add.assign.subject');
    Route::post('/store/assign/subject', 'StoreAssignSubject')->name('store.assign.subject');
    Route::get('/assign/subject/details/{id}', 'AssignSubjectDetails')->name('assign.subject.details');
    Route::get('/assign/subject/edit/{id}', 'AssignSubjectEdit')->name('assign.subject.edit');

    Route::post('/update/assign/subject', 'UpdateAssignSubject')->name('update.assign.subject');

    Route::get('/delete/class/subject/{class_id}/{subject_id}', 'DeleteClassSubject')->name('delete.class.subject');

    // Teacher's Subjects 
    Route::get('/teacher/subject/{id}', 'TeacherSubject')->name('teacher.subject');
    Route::post('/teacher/subject/store/{id}', 'TeacherSubjectStore')->name('store.teacher.subject');
    Route::get('/un/assign/subject/{subject_id}/{user_id}', 'UnAssignSubject')->name('un.assign.subject');

    // Teacher's Classes
    Route::get('/teacher/class/{id}', 'TeacherClass')->name('teacher.class');
    Route::post('/teacher/class/store/{id}', 'TeacherClassStore')->name('store.teacher.class');
    Route::get('/un/assign/class/{class_id}/{user_id}', 'UnAssignClass')->name('un.assign.class');

    Route::get('/teacher/delete/{id}', 'TeacherDelete')->name('teacher.delete');
});

// ALL TEACHERS GROUP ROUTES
Route::controller(TeacherController::class)->group(function(){
    Route::get('/all/teachers', 'AllTeachers')->name('all.teachers');
    Route::get('/add/teacher', 'AddTeacher')->name('add.teacher');
    Route::post('/store/teacher', 'StoreTeacher')->name('store.teacher');
    Route::get('/edit/teacher/{id}', 'EditTeacher')->name('edit.teacher');
    Route::get('/teacher/profile/{id}', 'TeacherProfile')->name('teacher.profile');
    
    Route::post('/update/teacher/{id}', 'UpdateTeacher')->name('update.teacher');

});


// PARENT ALL GROUP ROUTES
Route::controller(ParentController::class)->group(function(){
    Route::get('/all/parents', 'AllParents')->name('all.parents');
    Route::get('/add/parent', 'AddParent')->name('add.parent');
    Route::post('/store/parent', 'StoreParent')->name('store.parent');
    Route::get('/parent/profile/{id}', 'ParentProfile')->name('parent.profile');
    Route::get('/edit/parent/{id}', 'EditParent')->name('edit.parent');
    Route::post('/update/parent/{id}', 'UpdateParent')->name('update.parent');
    Route::get('/delete/parent/{id}', 'DeleteParent')->name('delete.parent');

    Route::post('attach/child/{parent_id}', 'AttachChild')->name('attach.child');
    Route::get('detach/child/{id}', 'DetachChild')->name('detach.child');
});


// Exams Fee All Routes
Route::controller(ExamFeeController::class)->group(function(){
    Route::get('/exam/fee/invoice/{id}', 'ExamFeeInvoice')->name('exam.fee.invoice');
    Route::get('callback', 'CAllBack')->name('callback');
});



}); // Admin's All routes ends

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
// Teacher
Route::middleware(['auth', 'role:Teacher,Admin'])->group(function (){
Route::get('/teacher/dashboard', [TeacherController::class, 'TeacherDashboard'])->name('teacher.dashboard');
});

// Parent
Route::middleware(['auth', 'role:Parent,Admin'])->group(function (){
Route::get('/parent/dashboard', [ParentController::class, 'ParentDashboard'])->name('parent.dashboard');
});



// Route::post('/admin/all/student', [AdminController::class, 'AdminAllStudent'])->name('admin.all.student');


