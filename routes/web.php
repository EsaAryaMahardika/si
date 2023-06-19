<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DBController;

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

/* Halaman Depan */
Route::view('/', 'index');
Route::view('/login', 'login');
Route::view('/register', 'register');

/* Halaman Kerusakan */
Route::get('/crash', [DBController::class, 'crash']);
Route::post('/i_crash', [DBController::class, 'crash_input']);
Route::put('/u_crash/{id}', [DBController::class, 'crash_update']);
Route::delete('/d_crash/{id}', [DBController::class, 'crash_delete']);

/* Halaman dashboard */
Route::get('/dashboard', [DBController::class, 'dashboard']);

/* Halaman gejala */
Route::get('/gejala', [DBController::class, 'gejala']);
Route::post('/i_gejala', [DBController::class, 'gejala_input']);
Route::put('/u_gejala/{id}', [DBController::class, 'gejala_update']);
Route::delete('/d_gejala/{id}', [DBController::class, 'gejala_delete']);

/* Halaman Laporan */
Route::get('/report', [DBController::class, 'report']);

/* Halaman Aturan */
Route::get('/rule', [DBController::class, 'rule']);
Route::put('/u_rule/{id}', [DBController::class, 'rule_update']);
Route::delete('/d_rule/{id}', [DBController::class, 'rule_delete']);

/* Halaman tutorial */
Route::get('/tutorial', [DBController::class, 'tutorial']);
Route::post('/i_tutorial', [DBController::class, 'tutorial_input']);
Route::put('/u_tutorial/{id}', [DBController::class, 'tutorial_update']);
Route::delete('/d_tutorial/{id}', [DBController::class, 'tutorial_delete']);

/* Halaman Teknisi */
Route::get('/engineer', [DBController::class, 'engineer']);
Route::post('/i_engineer', [DBController::class, 'engineer_input']);
Route::put('/u_engineer/{id}', [DBController::class, 'engineer_update']);
Route::delete('/d_engineer/{id}', [DBController::class, 'engineer_delete']);

/* Halaman Pengguna */
Route::get('/user', [DBController::class, 'user']);
Route::put('/u_user/{id}', [DBController::class, 'user_update']);
Route::delete('/d_user/{id}', [DBController::class, 'user_delete']);

/* Halaman provinsi */
Route::get('/provinsi', [DBController::class, 'provinsi']);
Route::post('/i_provinsi', [DBController::class, 'provinsi_input']);
Route::put('/u_provinsi/{id}', [DBController::class, 'provinsi_update']);
Route::delete('/d_provinsi/{id}', [DBController::class, 'provinsi_delete']);

/* Halaman kabupaten */
Route::get('/kabupaten', [DBController::class, 'kabupaten']);
Route::post('/i_kabupaten', [DBController::class, 'kabupaten_input']);
Route::put('/u_kabupaten/{id}', [DBController::class, 'kabupaten_update']);
Route::delete('/d_kabupaten/{id}', [DBController::class, 'kabupaten_delete']);
Route::get('/export_kabupaten', [DBController::class, 'kabupaten_export']);

/* Ajax Wilayah */
Route::get('kab/{id}', [DBController::class, 'kab']);

/* Forward Chaining */
Route::get('/select', [DBController::class, 'select']);
Route::post('/check', [DBController::class, 'check']);