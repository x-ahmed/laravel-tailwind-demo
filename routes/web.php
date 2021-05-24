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

Route::view('/welcome', 'frontend.index');
Route::view('/user/profile', 'frontend.profile');

Route::view('/admin/tables', 'backend.tables');
Route::view('/admin/settings', 'backend.settings');
Route::view('/admin/maps', 'backend.maps');
Route::view('/admin/dashboard', 'backend.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::view('/', 'welcome');
