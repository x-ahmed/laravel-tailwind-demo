<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\PostCommentController;
use App\Http\Controllers\Backend\PostCategoryController;

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

Route::group([
    'middleware' => ['auth:sanctum', 'verified'],
], function () {

    Route::group([
        'middleware' => ['role:admin|supervisor'],
        'prefix'     => 'admin',
        'as'         => 'admin.',
    ], function () {
        Route::resource('post_categories', PostCategoryController::class);
        Route::resource('post_comments', PostCommentController::class);
        Route::resource('posts', PostController::class);
        Route::resource('pages', PageController::class);

        Route::view('tables', 'backend.tables')->name('tables');
        Route::view('settings', 'backend.settings')->name('settings');
        Route::view('maps', 'backend.maps')->name('maps');
        Route::view('dashboard', 'backend.index')->name('dashboard');
        Route::view('/', 'backend.index')->name('index');
    });

    Route::view('/dashboard', 'dashboard')->name('dashboard');
});

Route::view('/profile', 'frontend.profile')->name('profile');
Route::view('/welcome', 'frontend.index')->name('welcome');
Route::view('/', 'frontend.index')->name('index');
// Route::view('/', 'welcome');
