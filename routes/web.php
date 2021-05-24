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



Route::view('/profile', 'frontend.profile')->name('profile');

Route::group([
    'prefix' => 'admin',
    'as'     => 'admin.',
], function () {
    Route::view('tables', 'backend.tables')->name('tables');
    Route::view('settings', 'backend.settings')->name('settings');
    Route::view('maps', 'backend.maps')->name('maps');
    Route::view('dashboard', 'backend.index')->name('dashboard');
    Route::view('/', 'backend.index')->name('index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::view('/welcome', 'frontend.index')->name('welcome');
Route::view('/', 'frontend.index')->name('index');
// Route::view('/', 'welcome');
