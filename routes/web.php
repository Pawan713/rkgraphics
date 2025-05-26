<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SchoolController;
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


Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('adminLogin');
Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->middleware('admin')->name('admin.dashboard');

Route::get('/admin/school', [SchoolController::class, 'index'])->middleware('admin')->name('admin.school');
Route::post('/admin/school/add', [SchoolController::class, 'add_School'])->middleware('admin')->name('admin.school.add');

Route::get('/admin/allstudent/{id}', [AdminAuthController::class, 'getAllStudent'])->middleware('admin')->name('admin.all.student');
Route::get('/admin/singlestudent/{id}', [AdminAuthController::class, 'getSingleStudent'])->middleware('admin')->name('admin.single.student');

Route::get('/admin/zipExport', [AdminAuthController::class, 'zipExport'])->middleware('admin')->name('admin.export.zip');
Route::get('/admin/excelExport', [AdminAuthController::class, 'exportStudents'])->middleware('admin')->name('admin.export.excel');

Route::get('/admin/logout', [AdminAuthController::class, 'adminLogout'])->name('admin.logout');


Route::get('/user/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
Route::post('/user/login', [UserAuthController::class, 'login']);
Route::get('/user/dashboard', [UserAuthController::class, 'dashboard'])->middleware('auth')->name('user.dashboard');

Route::get('/user/student', [StudentController::class, 'index'])->middleware('auth')->name('user.student');
Route::get('/user/addstudent', [StudentController::class, 'create'])->middleware('auth')->name('user.student.add');
Route::post('/user/storestudent', [StudentController::class, 'store'])->middleware('auth')->name('user.student.store');

Route::get('/user/editstudent/{id}', [StudentController::class, 'edit'])->middleware('auth')->name('user.student.edit');
Route::post('/user/updatestudent/{id}', [StudentController::class, 'update'])->middleware('auth')->name('user.student.update');

Route::get('/user/viewstudent/{id}', [StudentController::class, 'view'])->middleware('auth')->name('user.student.view');
Route::get('/user/deletestudent/{id}', [StudentController::class, 'destroy'])->middleware('auth')->name('user.student.delete');







// Route::post('/admin/logout', function () {
//     Auth::logout();
//     return redirect('/admin/login');
// })->name('admin.logout');

Route::post('/user/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('user.logout');
