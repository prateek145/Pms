<?php

use App\Http\Controllers\backend\AvailablityController;
use App\Http\Controllers\backend\ClientController;
use App\Http\Controllers\backend\DepartmentController;
use App\Http\Controllers\backend\NotificationSendController;
use App\Http\Controllers\backend\ProjectController;
use App\Http\Controllers\backend\PushNotification;
use App\Http\Controllers\backend\TaskController;
use App\Http\Controllers\backend\TimeLaggedController;
use App\Http\Controllers\backend\TimeSheetController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\HomeController;
use App\Models\PushSubscription;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Minishlink\WebPush\Subscription;
use Minishlink\WebPush\WebPush;

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

    Route::post('client/details', [ProjectController::class, 'client_details'])->name('client.details');
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

    Route::get('/push', [PushNotification::class, 'index'])->name('push.notification.home');
    // Route::post('/save-token', [PushNotification::class, 'saveToken'])->name('save-token');
    Route::post('/send-notification', [PushNotification::class, 'sendNotification'])->name('send.notification');

    // Route::get('send-email', function () {
    //     $data['email'] = 'prateekk898@gmail.com';
    //     $iii = dispatch(new App\Jobs\SendEmailJob($data));
    //     dd($iii);
    //     dd('mail send successfully');
    // });


    //push notification
    Route::post("admin/sendNotif", [PushNotification::class, 'SendNotification'])->name('admin.send_notifications');
    Route::post("push-subscribe", [PushNotification::class, 'CreateSubscription'])->name('push.subscribe');
});
