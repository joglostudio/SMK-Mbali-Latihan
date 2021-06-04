<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pengaduan/index', [App\Http\Controllers\PengaduanController::class, 'index'])->name('pengaduan.index');
Route::get('/pengaduan/create', [App\Http\Controllers\PengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('/pengaduan/store', [App\Http\Controllers\PengaduanController::class, 'store'])->name('pengaduan.store');
Route::get('/pengaduan/edit/{pengaduan}', [App\Http\Controllers\PengaduanController::class, 'edit'])->name('pengaduan.edit');
Route::post('/pengaduan/update/{pengaduan}', [App\Http\Controllers\PengaduanController::class, 'update'])->name('pengaduan.update');
Route::get('/pengaduan/update/{pengaduan}', [App\Http\Controllers\PengaduanController::class, 'destroy'])->name('pengaduan.destroy');


//Administrator
Route::group(['prefix' => 'admin'], function() {

    /**
     * Login
     */
    Route::get('login', [App\Http\Controllers\AuthAdmin\LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [App\Http\Controllers\AuthAdmin\LoginController::class, 'login'])->name('admin.login.submit');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/pengaduan/edit/{pengaduan}', [App\Http\Controllers\Admin\DashboardController::class, 'edit'])->name('admin.dashboard.pengaduan.edit');
        Route::post('/pengaduan/update/{pengaduan}', [App\Http\Controllers\Admin\DashboardController::class, 'update'])->name('admin.dashboard.pengaduan.update');

        /*
        * Logout
        */
        Route::post('logout/', [App\Http\Controllers\AuthAdmin\LoginController::class, 'logout'])->name('admin.logout');
    });
});
