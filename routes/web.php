<?php

use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\LoginController;
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
Route::redirect('/','admin');
Route::redirect('admin','admin/login');

Route::group(['prefix' => 'admin', 'middleware'=> 'auth:sanctum'], function(){
    Route::get('profile',[ProfileController::class,'getProfile'])->name('admin.profile');
    Route::get('/dashboard',[AdminDashboard::class,'getDashboard'])->name('admin.dashboard');
    Route::post('add-category',[AdminDashboard::class,'addCategory'])->name('add.category');
    Route::resources([
        'users' => UserController::class
    ]);
});
Route::view('user/login', 'auth.userlogin');
Route::group(['prefix' => 'user', 'middleware'=> 'guest:user'], function(){
    Route::post('login-check', [LoginController::class,'userLogin'])->name('user.login');
    Route::get('/dashboard', [DashboardController::class,'getDashboard'])->name('user.dashboard');
    Route::post('/logout', [LoginController::class,'logout'])->name('user.logout');

    // Route::get('profile',[ProfileController::class,'getProfile'])->name('admin.profile');
    // Route::get('/dashboard',[AdminDashboard::class,'getDashboard'])->name('admin.dashboard');
    // Route::resources([
    //     'users' => UserController::class
    // ]);
});
Route::get('clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('clear-compiled');
    return 'Cleared.';
});