<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserAdd;
use App\Http\Controllers\PostController;
use App\Http\Controllers\tests;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ExerciseCategoryController;
use App\Http\Controllers\Admin\ExerciseController as AdminExerciseController;
use App\Http\Controllers\Admin\FoodPlanController as AdminFoodPlanController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\MeasurementsController as AdminMeasurementsController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\AvailableTeachersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\Student\Food_PlanController;
use App\Http\Controllers\Student\MeasurementsController;
use App\Http\Controllers\Student\Workout_PlanController;
use App\Http\Controllers\Trainer\TrainerController;

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
    // Route::get('/classinfo/{id}', [StudentController::class, 'show'])->name('classshow');
});
// Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
//for admins
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::resource('users', UsersController::class)->names('admin.users');
    Route::get('asesorados', [Admin::class, 'index'])->name('admin_user_dash');
    // Route::post('/adduser', [AdminUserAdd::class, 'adduser']);
    // Route::get('/edit/{id}', [AdminUserAdd::class, 'edit']);
    // Route::post('/updateuser', [AdminUserAdd::class, 'updateuser'])->name('updateuser');
    // Route::post('/updateuserpw', [AdminUserAdd::class, 'updateuserpw'])->name('updateuserpw');
    // Route::get('/delete/{id}', [AdminUserAdd::class, 'delete']);

    Route::get('admin/adminblog', [Admin::class, 'index'])->name('adminblog');
    Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::resource('tags', TagController::class)->names('admin.tags');
    Route::resource('posts', PostsController::class)->names('admin.posts');

    Route::resource('exercises', AdminExerciseController::class)->names('admin.exercise_guide');
    Route::resource('exercise_categories', ExerciseCategoryController::class)->names('admin.exercise_guide_category');

    Route::resource('user_measurement', AdminMeasurementsController::class)->names('admin.a_measurements');

    Route::resource('user_food_plan', AdminFoodPlanController::class)->names('admin.a_food_plan');
    Route::get('foodPlan/{a}', [AdminFoodPlanController::class, 'createMeal'])->name('admin.a_food_plan.createMeal');
    Route::post('foodPlan', [AdminFoodPlanController::class, 'storeMeal'])->name('admin.a_food_plan.storeMeal');
    Route::get('meal/{meal}/edit', [AdminFoodPlanController::class, 'editMeal'])->name('admin.a_food_plan.editMeal');
    Route::post('meal{meal}', [AdminFoodPlanController::class, 'updateMeal'])->name('admin.a_food_plan.updateMeal');
    Route::delete('meal{meal}', [AdminFoodPlanController::class, 'deleteMeal'])->name('admin.a_food_plan.deleteMeal');
    
    Route::resource('workout_plan', AdminExerciseController::class)->names('admin.a_workout_plan');
});

//no protections
Route::get('blog/index', [PostController::class, 'index'])->name('blog');
Route::get('blog/{post}', [PostController::class, 'show'])->name('postshow');
Route::get('category/{category}', [PostController::class, 'category'])->name('postscategory');
Route::get('tag/{tag}', [PostController::class, 'tag'])->name('poststag');

Route::get('guia/index', [ExerciseController::class, 'index'])->name('exercise_guide');
Route::get('guia/{exercise}', [ExerciseController::class, 'show'])->name('exercise_show');
Route::get('categoria_ejercicio/{category}', [ExerciseController::class, 'category'])->name('exercise_category');

Route::get('tests', [tests::class, 'index'])->name('tests');

// for students
Route::group(['middleware' => ['auth', 'role:asesorado']], function () {
    Route::get('student/profile', [StudentController::class, 'index'])->name('student.profile');
    Route::put('/updateavatar/{user}', [StudentController::class, 'updateavatar'])->name('updateavatar');
    Route::post('/updateprofile', [StudentController::class, 'updateprofile'])->name('updateprofile');
    Route::post('/updatepw', [StudentController::class, 'updatepw'])->name('updatepw');

    Route::resource('measurement', MeasurementsController::class)->names('student.measurements');
    Route::resource('mi_plan_alimenticio', Food_PlanController::class)->names('student.food_plan');
    Route::resource('mi_plan', Workout_PlanController::class)->names('student.workout_plan');
});

// for teachers
Route::group(['middleware' => ['auth', 'role:entrenador']], function () {
    Route::get('trainer/profile', [TrainerController::class, 'index'])->name('trainer.profile');
    Route::put('/updatetavatar/{user}', [TrainerController::class, 'updatetavatar'])->name('updatetavatar');
    Route::post('/updatetprofile', [TrainerController::class, 'updatetprofile'])->name('updatetprofile');
    Route::post('/updatetpw', [TrainerController::class, 'updatetpw'])->name('updatetpw');    
});

require __DIR__ . '/auth.php';
