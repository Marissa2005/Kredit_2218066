<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalonKrediturController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\UserController;
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

Route::controller(AuthController::class)->prefix('')->group(function () {
    Route::get(
        '/',
        'index'
    )->name('auth.index');
    Route::get('/register', function () {
        return view('auth.register');
    })->name('auth.register');
    Route::post('/register', 'register')->name('auth.postRegister');
    Route::post('/login', 'login')->name('auth.login');
    Route::get(
        '/logout',
        'logout'
    )->name('auth.logout');
});


Route::middleware(['auth.custom'])->group(
    function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        // route user
        Route::controller(UserController::class)->prefix('user')->group(function () {
            Route::get('/', 'index')->name('user.index');
            Route::post('/', 'store')->name('user.store');
            Route::put('/{id}', 'update')->name('user.update');
            Route::get('/{id}', 'destroy')->name('user.destroy');
        });

        // route karyawan
        Route::controller(KaryawanController::class)->prefix('karyawan')->group(function () {
            Route::get('/', 'index')->name('karyawan.index');
            Route::post('/', 'store')->name('karyawan.store');
            Route::put('/{id}', 'update')->name('karyawan.update');
            Route::get('/{id}', 'destroy')->name('karyawan.destroy');
        });

        // route kreditur
        Route::controller(CalonKrediturController::class)->prefix('kreditur')->group(function () {
            Route::get('/', 'index')->name('kreditur.index');
            Route::post('/', 'store')->name('kreditur.store');
            Route::put('/{id}', 'update')->name('kreditur.update');
            Route::get('/{id}', 'destroy')->name('kreditur.destroy');
        });

        // route kriteria
        Route::controller(KriteriaController::class)->prefix('kriteria')->group(function () {
            Route::get('/', 'index')->name('kriteria.index');
            Route::post('/', 'store')->name('kriteria.store');
            Route::put('/{id}', 'update')->name('kriteria.update');
            Route::get('/{id}', 'destroy')->name('kriteria.destroy');
        });

        // route subkriteria
        Route::controller(SubKriteriaController::class)->prefix('sub-Kriteria')->group(function () {
            Route::get('/', 'index')->name('subKriteria.index');
            Route::post('/', 'store')->name('subKriteria.store');
            Route::put('/{id}', 'update')->name('subKriteria.update');
            Route::get('/{id}', 'destroy')->name('subKriteria.destroy');
        });

        // route penilaian
        Route::controller(PenilaianController::class)->prefix('penilaian')->group(function () {
            Route::get('/', 'index')->name('penilaian.index');
            Route::post('/', 'store')->name('penilaian.store');
            Route::get('/print', 'cetak')->name('penilaian.print');
            Route::get('/{id}', 'destroy')->name('penilaian.destroy');
        });
    }
);
