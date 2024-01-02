<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VLKPanelController;

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

// DELETE THIS LINE WHEN CONNECTING TO CUSTOM SITE!
Route::get('/', 'AuthController@login_index');

Route::group(['prefix'=>'admin'], function() {
    // Login
    Route::get('/login', 'AuthController@login_index')->name('vlk_login_index');
    Route::post('/login', 'AuthController@login')->name('vlk_login');
    // Register
    Route::get('/register', 'AuthController@register_index')->name('vlk_register_index');
    Route::post('/register', 'AuthController@register')->name('vlk_register');
    // Logout
    Route::get('/logout', 'AuthController@logout')->name('vlk_logout');
    // Reset password
    Route::get('/reset', 'AuthController@reset_index')->name('vlk_reset_index');
    Route::post('/reset');
    // VLK Editor Panel
    Route::get('/dashboard', 'VLKPanelController@index')->middleware('auth', 'verified')->name('vlkadm_dashboard.index');
    // VLK Editor Services
    Route::resource('/services', 'VLKServicesController')->middleware('auth', 'verified');
    // VLK Editor Testimonials
    Route::resource('/testimonials', 'VLKTestimonialsController')->middleware('auth', 'verified');
    // VLK Editor Blog posts
    Route::resource('/blog', 'VLKBlogController')->middleware('auth', 'verified');
});

Auth::routes();

// Clearing route if you run into problems
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
