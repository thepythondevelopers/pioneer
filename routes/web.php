<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Destination\DashboardController;
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

Route::group(['prefix' => 'destination'], function () {
    Route::get('login',[DashboardController::class, 'login'])->name('destination.login');
    Route::get('register',[DashboardController::class, 'register'])->name('destination.register');
    Route::get('register-steps',[DashboardController::class, 'register_steps'])->name('destination.register.steps');

    Route::get('create-job',[DashboardController::class, 'create_job'])->name('destination.create.job');
    Route::get('home',[DashboardController::class, 'home'])->name('destination.home');
    Route::get('notification',[DashboardController::class, 'notification'])->name('destination.notification');
    Route::get('chat',[DashboardController::class, 'chat'])->name('destination.chat');
    Route::get('job-history',[DashboardController::class, 'job_history'])->name('destination.job.history');
    Route::get('job-history-detail',[DashboardController::class, 'job_history_detail'])->name('destination.job.history.detail');
    Route::get('my-spending',[DashboardController::class, 'my_spending'])->name('destination.my-spending');
    Route::get('on-going-job',[DashboardController::class, 'on_going_job'])->name('destination.on-going-job');
    Route::get('on-going-job-detail',[DashboardController::class, 'on_going_job_detail'])->name('destination.on-going-job-detail');
    Route::get('single-job-detail',[DashboardController::class, 'single_job_detail'])->name('destination.single-job-detail');
    
    Route::get('setting',[DashboardController::class, 'setting'])->name('destination.setting');
});