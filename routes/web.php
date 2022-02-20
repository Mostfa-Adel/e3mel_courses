<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\App;

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

App::setLocale('en');

Route::group(['prefix'=>'dashboard', 'middleware' => 'auth'],function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('courses', CourseController::class);
    Route::get('', [CourseController::class, 'index']);
});

Route::get('/', [HomeController::class, 'home']);


require __DIR__.'/auth.php';
