<?php

use App\Http\Controllers\backend\AvailablityController;
use App\Http\Controllers\backend\ClientController;
use App\Http\Controllers\backend\DepartmentController;
use App\Http\Controllers\backend\ProjectController;
use App\Http\Controllers\backend\TaskController;
use App\Http\Controllers\backend\TimeLaggedController;
use App\Http\Controllers\backend\TimeSheetController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return redirect()->route('home');
})->middleware('auth');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('dashboard/previousmonth/{date}', [HomeController::class, 'previousmonth_dashboard'])->name('previousmonth.dashboard');
    Route::get('dashboard/nextmonth/{date}', [HomeController::class, 'nextmonth_dashboard'])->name('nextmonth.dashboard');
    
    Route::resource('users', UserController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('departments', DepartmentController::class);
    Route::post('client_details', [DepartmentController::class, 'client_details'])->name('client.details');

    Route::get('projects/{id}/{key}', [ProjectController::class, 'images_delete']);
    Route::resource('tasks', TaskController::class);
    Route::get('tasks/{id}/{key}', [TaskController::class, 'images_delete']);
    Route::get('tasks-list/{date}', [TaskController::class, 'task_list'])->name('task.list');
    Route::post('check/availablity', [TaskController::class, 'check_availablity'])->name('check.availablity');
    Route::resource('availablity', AvailablityController::class);
    Route::resource('timesheet', TimeSheetController::class);
    Route::resource('timelagged', TimeLaggedController::class);
    Route::post('check/timelagged', [TimeLaggedController::class, 'check_timelagged'])->name('check.timelagged');
});


