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
use App\Http\Controllers\Admin\UsersController;

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
    Route::resource('users', UsersController::class)->names('admin.users');
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
});

//no protections
Route::get('blog/index', [PostController::class, 'index'])->name('blog');
Route::get('blog/{post}', [PostController::class, 'show'])->name('postshow');
Route::get('category/{category}', [PostController::class, 'category'])->name('postscategory');
Route::get('tag/{tag}', [PostController::class, 'tag'])->name('poststag');


Route::get('tests', [tests::class, 'index'])->name('tests');

// for students
Route::group(['middleware' => ['auth', 'role:asesorado']], function () {
    Route::get('student/profile', [StudentController::class, 'index'])->name('student.profile');
    Route::put('/updateavatar/{user}', [StudentController::class, 'updateavatar'])->name('updateavatar');
    Route::post('/updateprofile', [StudentController::class, 'updateprofile'])->name('updateprofile');
    Route::post('/updatepw', [StudentController::class, 'updatepw'])->name('updatepw');    
});

// for teachers
Route::group(['middleware' => ['auth', 'role:entrenador']], function () {
    Route::get('teacher/profile', [TeacherController::class, 'index'])->name('teacher.profile');
    Route::put('/updatetavatar/{user}', [TeacherController::class, 'updatetavatar'])->name('updatetavatar');
    Route::post('/updatetprofile', [TeacherController::class, 'updatetprofile'])->name('updatetprofile');
    Route::post('/updatetpw', [TeacherController::class, 'updatetpw'])->name('updatetpw');
    Route::post('/updatedetails', [TeacherController::class, 'updatedetails'])->name('updatedetails');    
});

require __DIR__ . '/auth.php';
