<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserAdd;
use App\Http\Controllers\PostController;
use App\Http\Controllers\tests;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\AvailableTeachersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//auth route all0
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/classinfo/{id}', [StudentController::class, 'show'])->name('classshow');
});
// Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
//for admins
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('admin/adminuseradd', [AdminUserAdd::class, 'index'])->name('adminadd');
    Route::post('/adduser', [AdminUserAdd::class, 'adduser']);
    Route::get('/edit/{id}', [AdminUserAdd::class, 'edit']);
    Route::post('/updateuser', [AdminUserAdd::class, 'updateuser'])->name('updateuser');
    Route::post('/updateuserpw', [AdminUserAdd::class, 'updateuserpw'])->name('updateuserpw');
    Route::get('/delete/{id}', [AdminUserAdd::class, 'delete']);

    Route::get('admin/adminblog', [Admin::class, 'index'])->name('adminblog');
    Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::resource('tags', TagController::class)->names('admin.tags');
    Route::resource('posts', PostsController::class)->names('admin.posts');
    Route::resource('languages', LanguageController::class)->names('admin.languages');
    Route::resource('products', ProductsController::class)->names('admin.products');
});

//no protections
Route::get('blog/index', [PostController::class, 'index'])->name('blog');
Route::get('blog/{post}', [PostController::class, 'show'])->name('postshow');
Route::get('category/{category}', [PostController::class, 'category'])->name('postscategory');
Route::get('tag/{tag}', [PostController::class, 'tag'])->name('poststag');
Route::get('teachers/index', [AvailableTeachersController::class, 'index'])->name('teachers');
Route::get('teachers/{teacher}', [AvailableTeachersController::class, 'show'])->name('teachershow');
Route::get('teacherlanguage/{language}', [AvailableTeachersController::class, 'language'])->name('teacherlanguage');


Route::get('tests', [tests::class, 'index'])->name('tests');

// for students
Route::group(['middleware' => ['auth', 'role:student']], function () {
    Route::get('student/profile', [StudentController::class, 'index'])->name('student.profile');
    Route::put('/updateavatar/{user}', [StudentController::class, 'updateavatar'])->name('updateavatar');
    Route::post('/updateprofile', [StudentController::class, 'updateprofile'])->name('updateprofile');
    Route::post('/updatepw', [StudentController::class, 'updatepw'])->name('updatepw');
    Route::post('/cancelclass', [StudentController::class, 'cancelclass'])->name('cancelclass');
    Route::post('teachers/reserve', [AvailableTeachersController::class, 'reserve'])->name('reserveClass');
    Route::get('classplans', [ProductController::class, 'classplans'])->name('classplans');
    Route::get('products/{product}/pay', [ProductController::class, 'pay'])->name('pay');
    Route::get('purchase_success', [ProductController::class, 'purchase_success'])->name('purchase_success');
});

// for teachers
Route::group(['middleware' => ['auth', 'role:teacher']], function () {
    Route::get('teacher/profile', [TeacherController::class, 'index'])->name('teacher.profile');
    Route::put('/updatetavatar/{user}', [TeacherController::class, 'updatetavatar'])->name('updatetavatar');
    Route::post('/updatetprofile', [TeacherController::class, 'updatetprofile'])->name('updatetprofile');
    Route::post('/updatetpw', [TeacherController::class, 'updatetpw'])->name('updatetpw');
    Route::post('/updatedetails', [TeacherController::class, 'updatedetails'])->name('updatedetails');
    Route::get('teacher/class', [TeacherController::class, 'allClasses'])->name('teacher.allclasses');
    Route::get('teacher/createclass', [TeacherController::class, 'createclass'])->name('teacher.create.class');
    Route::get('teacher/editclass/{id}', [TeacherController::class, 'editclass'])->name('teacher.edit.class');
    //No se porque no funciona con POST, pero ya con get jala sin pedos, al inicio me equivoque con la ruta .create.class
    Route::get('teacher/create', [TeacherController::class, 'classcreate'])->name('teacher.class.create');
    Route::post('teacher/edit', [TeacherController::class, 'classedit'])->name('teacher.class.update');
    Route::get('teacher/deleteclass/{id}', [TeacherController::class, 'deleteclass'])->name('teacher.delete.class');
    Route::get('teacher/test', [TeacherController::class, 'testing'])->name('teacher.testing');
    // Route::resource('classes',ClassesController::class)->names('teacher.classes');
    // Route::get('/classinfo/{id}',[TeacherController::class,'show'])->name('classshow');
});

require __DIR__ . '/auth.php';
