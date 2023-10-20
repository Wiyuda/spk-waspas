<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\EvaluationController;
use App\Http\Controllers\Auth\AuthenticationController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthenticationController::class, 'index'])->name('login');
Route::post('/authentication', [AuthenticationController::class, 'authentication'])->name('authentication');


Route::prefix('/admin')->group(function() {
    Route::middleware('auth')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('karyawan', EmployeeController::class);

        Route::resource('/penilaian', EvaluationController::class);

        Route::post('logout', [AuthenticationController::class, 'logout'])->name('logout');
    });

});