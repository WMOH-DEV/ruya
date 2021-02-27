<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ModController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ResidenceController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TestimonialController;
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
Route::view('user/profile/edit', 'main.user.profile.edit')->middleware('auth');

//Privacy Page
Route::get('pages/privacy', [PageController::class, 'privacyIndex']);

//Faq Page
// Route::get('pages/faq', [PageController::class, 'faqIndex']);
Route::get('pages/faq', [FaqController::class, 'mainIndex']);

//contact Page
Route::get('pages/contact', [MessageController::class, 'contactIndex']);
Route::post('pages/contact/send', [MessageController::class, 'contactStore']);

// Ajax request route
Route::get('search-stage/{array}', [TeacherController::class, 'getSubjects']);

// Teacher List view
Route::get('teachers', [TeacherController::class, 'getList'])->name('teachers.list');

// search Teacher
Route::get('search', [TeacherController::class, 'results'])->name('search');
Route::get('results', [HomeController::class, 'mainSearch'])->name('results');


Route::middleware(['auth', 'verified'])->group(function () {
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

Route::group(['middleware' => ['auth', 'isAdmin', 'verified']], function () {

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

    // residence Routes
    Route::get('admincp/residences', [ResidenceController::class, 'index']);
    Route::post('admincp/residences/add', [ResidenceController::class, 'create']);
    Route::post('admincp/residences/update', [ResidenceController::class, 'update']);
    Route::post('admincp/residences/suspend', [ResidenceController::class, 'destroy']);

    // Order
    Route::get('admincp/orders', [OrderController::class, 'index']);
    Route::post('admincp/orders/update', [OrderController::class, 'update']);

    // pages
    Route::get('admincp/pages/privacy', [PageController::class, 'privacy']);
    Route::post('admincp/pages/privacy/sent', [PageController::class, 'receivePrivacy']);
    Route::get('admincp/pages/terms', [PageController::class, 'terms']);
    Route::post('admincp/pages/terms/sent', [PageController::class, 'receiveTerms']);
    Route::get('admincp/pages/about', [PageController::class, 'about']);
    Route::post('admincp/pages/about/sent', [PageController::class, 'receiveAbout']);
    Route::get('admincp/pages/faq', [FaqController::class, 'index']);
    Route::post('admincp/pages/faq/store', [FaqController::class, 'store']);
    Route::put('admincp/pages/faq/update/{ques}', [FaqController::class, 'update']);
    Route::delete('admincp/pages/faq/delete/{ques}', [FaqController::class, 'destroy']);

    Route::get('admincp/pages/testimonials', [TestimonialController::class, 'index']);
    Route::post('admincp/pages/testimonials/store', [TestimonialController::class, 'store']);
    Route::put('admincp/pages/testimonials/update/{test}', [TestimonialController::class, 'update']);
    Route::delete('admincp/pages/testimonials/delete/{test}', [TestimonialController::class, 'destroy']);

    // Home Statics
    Route::get('admincp/pages/home', [AdminController::class, 'homeStatics']);
    Route::put('admincp/pages/home/update/{home}', [AdminController::class, 'updateHomeStatics']);

    // Courses
    Route::get('admincp/categories', [CategoryController::class, 'index']);
    Route::post('admincp/categories/add', [CategoryController::class, 'store']);
    Route::put('admincp/categories/update/{cat}', [CategoryController::class, 'update']);
    Route::delete('admincp/categories/delete/{cat}', [CategoryController::class, 'destroy']);

    Route::get('admincp/courses', [CourseController::class, 'index']);
    Route::post('admincp/courses/add', [CourseController::class, 'store']);
    Route::put('admincp/courses/update/{cat}', [CourseController::class, 'update']);
    Route::delete('admincp/courses/delete/{cat}', [CourseController::class, 'destroy']);

    // Mods
    Route::get('admincp/moderators', [ModController::class, 'index']);
    Route::post('admincp/moderators/add', [ModController::class, 'store']);
    Route::put('admincp/moderators/update/{user}', [ModController::class, 'update']);
    Route::post('admincp/moderators/suspend', [ModController::class, 'destroy']);
    Route::get('admincp/moderators/suspended', [ModController::class, 'suspended']);
    Route::post('admincp/moderators/restore', [ModController::class, 'restore']);
    Route::post('admincp/moderators/delete', [ModController::class, 'delete']);

    // Contact us
    Route::get('admincp/messages', [MessageController::class, 'index']);
    Route::get('admincp/messages/show/{msg}', [MessageController::class, 'show']);
    Route::post('admincp/messages/response/{message}', [MessageController::class, 'response']);
    Route::post('admincp/messages/destroy', [MessageController::class, 'destroy']);
}); // End Admin routes
