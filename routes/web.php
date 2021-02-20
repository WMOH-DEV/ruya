<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Main View for the website
|
*/

Route::post('logged_in', [LoginController::class, 'authenticate'])->name('customLog');

Route::get('/', [HomeController::class, 'getHome'])->middleware('teacherUpdated');

Route::view('user/profile/edit', 'main.user.profile.edit')->middleware('auth');

//Privacy Page
Route::get('pages/privacy', [PageController::class, 'privacyIndex']);

//Faq Page
Route::get('pages/faq', [PageController::class, 'faqIndex']);


// Ajax request route
Route::get('search-stage/{array}', [TeacherController::class, 'getSubjects']);

// Teacher List view
Route::get('teachers', [TeacherController::class, 'getList'])->name('teachers.list');

// search Teacher
Route::get('search', [TeacherController::class, 'results'])->name('search');
Route::get('results', [HomeController::class, 'mainSearch'])->name('results');


Route::middleware(['auth','verified'])->group(function () {
    // Access to the Teacher update form
    Route::get('update-info', [TeacherController::class, 'getUpdateView']);
    Route::post('update-info', [TeacherController::class, 'updateInfo'])->name('updateInfo');

    // Show teacher
    Route::get('teachers/show/{id}', [TeacherController::class, 'show']);

    // Access order pages
    Route::get('booking/teacher/{id}', [OrderController::class, 'create']);

    // create order
    Route::post('booking/teacher/create', [OrderController::class, 'store'])->name('create-order');
});






/********************
 * Admin Routes
 *******************/

Route::group(['middleware' => ['isAdmin']], function () {

    // Admin Main
    Route::get('admincp', [AdminController::class, 'index']);

    //Teacher Routes
    Route::get('admincp/teachers', [TeacherController::class, 'index']);
    Route::get('admincp/teachers/pending', [TeacherController::class, 'indexPending']);
    Route::post('admincp/teachers/suspend', [TeacherController::class, 'destroy']);
    Route::get('admincp/teachers/suspended', [TeacherController::class, 'suspended']);
    Route::post('admincp/teachers/restore', [TeacherController::class, 'restore']);
    Route::post('admincp/teachers/delete', [TeacherController::class, 'delete']);
    Route::post('admincp/teachers/accept', [TeacherController::class, 'accept']);

    // student routes
    Route::get('admincp/students', [StudentController::class, 'index']);
    Route::get('admincp/students/inactive', [StudentController::class, 'inactive']);
    Route::get('admincp/students/suspended', [StudentController::class, 'suspended']);
    Route::post('admincp/students/suspend', [StudentController::class, 'destroy']);
    Route::post('admincp/students/restore', [StudentController::class, 'restore']);
    Route::post('admincp/students/send', [StudentController::class, 'inactiveMsg']);

    // Subject Routes
    Route::get('admincp/subjects', [SubjectController::class, 'index']);
    Route::post('admincp/subjects/add', [SubjectController::class, 'create']);
    Route::post('admincp/subjects/update', [SubjectController::class, 'update']);
    Route::post('admincp/subjects/suspend', [SubjectController::class, 'destroy']);

    // Stage Routes
    Route::get('admincp/stages', [StageController::class, 'index']);
    Route::post('admincp/stages/add', [StageController::class, 'create']);
    Route::post('admincp/stages/update', [StageController::class, 'update']);
    Route::post('admincp/stages/suspend', [StageController::class, 'destroy']);

    // Country Routes
    Route::get('admincp/countries', [CountryController::class, 'index']);
    Route::post('admincp/countries/add', [CountryController::class, 'create']);
    Route::post('admincp/countries/update', [CountryController::class, 'update']);
    Route::post('admincp/countries/suspend', [CountryController::class, 'destroy']);

    // Order
    Route::get('admincp/orders', [OrderController::class, 'index']);
    Route::post('admincp/orders/update', [OrderController::class, 'update']);

    // Social
    Route::get('admincp/pages/privacy', [PageController::class, 'privacy']);
    Route::post('admincp/pages/privacy/sent', [PageController::class, 'receivePrivacy']);
    Route::get('admincp/pages/faq', [PageController::class, 'faq']);
    Route::post('admincp/pages/faq/sent', [PageController::class, 'receiveFaq']);
    Route::get('admincp/pages/social', [PageController::class, 'social']);
}); // End Admin routes
