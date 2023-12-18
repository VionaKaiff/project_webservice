<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ReferensiController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// routing modul
Route::get('modul/{filename}', function ($filename) {
    $path = storage_path('app/modul/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    $file = file_get_contents($path);
    $type = mime_content_type($path);

    return response($file)->header('Content-Type', $type);
})->name('show-modul');

Route::get('gambar/{filename}', function ($filename) {
    $path = storage_path('app/gambar/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    $file = file_get_contents($path);
    $type = mime_content_type($path);

    return response($file)->header('Content-Type', $type);
})->name('show-gambar');



Route::get('/', function () {
    return view('welcome');
});

// Route::post('/login', [LoginController::class, 'login'])->name('login');
Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    // Route master data module
    Route::get('module', [ModuleController::class, 'index'])->name('module.index');
    Route::get('module/create', [ModuleController::class, 'create'])->name('module.create');
    Route::get('module/edit/{id}', [ModuleController::class, 'edit'])->name('module.edit');
    Route::get('module/show/{id}', [ModuleController::class, 'show'])->name('module.show');
    Route::patch('module/{id}', [ModuleController::class, 'update'])->name('module.update');
    Route::post('module/store', [ModuleController::class, 'store'])->name('module.store');
    Route::delete('module/destroy/{id}', [ModuleController::class, 'destroy'])->name('module.destroy');

    //Route master data referensi
    Route::get('referensi', [ReferensiController::class, 'index'])->name('referensi.index');
    Route::get('referensi/create', [ReferensiController::class, 'create'])->name('referensi.create');
    Route::get('referensi/edit/{id}', [ReferensiController::class, 'edit'])->name('referensi.edit');
    Route::patch('referensi/{id}', [ReferensiController::class, 'update'])->name('referensi.update');
    Route::post('referensi/store', [ReferensiController::class, 'store'])->name('referensi.store');
    Route::delete('referensi/destroy/{id}', [ReferensiController::class, 'destroy'])->name('referensi.destroy');

    // Route master data student
    Route::get('student', [StudentController::class, 'index'])->name('student.index');
    Route::get('student/create', [StudentController::class, 'create'])->name('student.create');
    Route::get('student/edit/{id}', [studentController::class, 'edit'])->name('student.edit');
    Route::patch('student/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::post('student/store', [StudentController::class, 'store'])->name('student.store');
    Route::delete('student/destroy/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

    // Route master data admin
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});
