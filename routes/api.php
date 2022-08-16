<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{NotificationController};
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function () {
    Route::get('/', function () {
        return response()->json('hiii', 200);
    });

    Route::prefix('auth')->middleware('api')->group(function () {
        Route::get('/me', [AuthController::class,'me'])->name('auth.me');
        Route::post('/login', [AuthController::class,'login'])->name('auth.login');
        Route::post('/register', [AuthController::class,'register'])->name('auth.register');
        Route::post('/refresh', [AuthController::class, 'refresh'])->name('auth.refresh');
        Route::post('/logout', [AuthController::class,'logout'])->name('auth.logout');

    });



    Route::prefix('appointment')->group(function () {
        Route::get('/', [Appointment::class,'index'])->name('appointment.index');
        Route::get('/create', [Appointment::class,'create'])->name('appointment.create');
        Route::post('/store', [Appointment::class,'store'])->name('appointment.store');
        Route::get('/edit/{id}', [Appointment::class,'edit'])->name('appointment.edit');
        Route::post('/update/{id}', [Appointment::class,'update'])->name('appointment.update');
        Route::get('/delete/{id}', [Appointment::class,'destroy'])->name('appointment.delete');
    });


    Route::prefix('batch')->group(function () {
        Route::get('/', [BatchController::class,'index'])->name('batch.index');
        Route::get('/create', [BatchController::class,'create'])->name('batch.create');
        Route::post('/store', [BatchController::class,'store'])->name('batch.store');
        Route::get('/edit/{id}', [BatchController::class,'edit'])->name('batch.edit');
        Route::post('/update/{id}', [BatchController::class,'update'])->name('batch.update');
        Route::get('/delete/{id}', [BatchController::class,'destroy'])->name('batch.delete');
    });


    Route::prefix('consultation')->group(function () {
        Route::get('/', [ConsultationController::class,'index'])->name('consultation.index');
        Route::get('/create', [ConsultationController::class,'create'])->name('consultation.create');
        Route::post('/store', [ConsultationController::class,'store'])->name('consultation.store');
        Route::get('/edit/{id}', [ConsultationController::class,'edit'])->name('consultation.edit');
        Route::post('/update/{id}', [ConsultationController::class,'update'])->name('consultation.update');
        Route::get('/delete/{id}', [ConsultationController::class,'destroy'])->name('consultation.delete');
    });

    Route::prefix('journal')->group(function () {
        Route::get('/', [JournalController::class,'index'])->name('journal.index');
        Route::get('/create', [JournalController::class,'create'])->name('journal.create');
        Route::post('/store', [JournalController::class,'store'])->name('journal.store');
        Route::get('/edit/{id}', [JournalController::class,'edit'])->name('journal.edit');
        Route::post('/update/{id}', [JournalController::class,'update'])->name('journal.update');
        Route::get('/delete/{id}', [JournalController::class,'destroy'])->name('journal.delete');
    });


    Route::prefix('level')->group(function () {
        Route::get('/', [LevelController::class,'index'])->name('level.index');
        Route::get('/create', [LevelController::class,'create'])->name('level.create');
        Route::post('/store', [LevelController::class,'store'])->name('level.store');
        Route::get('/edit/{id}', [LevelController::class,'edit'])->name('level.edit');
        Route::post('/update/{id}', [LevelController::class,'update'])->name('level.update');
        Route::get('/delete/{id}', [LevelController::class,'destroy'])->name('level.delete');
    });


    Route::prefix('module')->group(function () {
        Route::get('/', [ModuleController::class,'index'])->name('module.index');
        Route::get('/create', [ModuleController::class,'create'])->name('module.create');
        Route::post('/store', [ModuleController::class,'store'])->name('module.store');
        Route::get('/edit/{id}', [ModuleController::class,'edit'])->name('module.edit');
        Route::post('/update/{id}', [ModuleController::class,'update'])->name('module.update');
        Route::get('/delete/{id}', [ModuleController::class,'destroy'])->name('module.delete');
    });


    Route::prefix('notification')->group(function () {
        Route::get('/', [NotificationController::class,'index'])->name('notification.index');
        Route::get('/create', [NotificationController::class,'create'])->name('notification.create');
        Route::post('/store', [NotificationController::class,'store'])->name('notification.store');
        Route::get('/edit/{id}', [NotificationController::class,'edit'])->name('notification.edit');
        Route::post('/update/{id}', [NotificationController::class,'update'])->name('notification.update');
        Route::get('/delete/{id}', [NotificationController::class,'destroy'])->name('notification.delete');
    });


    Route::prefix('task')->group(function () {
        Route::get('/', [TaskController::class,'index'])->name('task.index');
        Route::get('/create', [TaskController::class,'create'])->name('task.create');
        Route::post('/store', [TaskController::class,'store'])->name('task.store');
        Route::get('/edit/{id}', [TaskController::class,'edit'])->name('task.edit');
        Route::post('/update/{id}', [TaskController::class,'update'])->name('task.update');
        Route::get('/delete/{id}', [TaskController::class,'destroy'])->name('task.delete');
    });


    Route::prefix('transaction')->group(function () {
        Route::get('/', [Transaction::class,'index'])->name('transaction.index');
        Route::get('/create', [Transaction::class,'create'])->name('transaction.create');
        Route::post('/store', [Transaction::class,'store'])->name('transaction.store');
        Route::get('/edit/{id}', [Transaction::class,'edit'])->name('transaction.edit');
        Route::post('/update/{id}', [Transaction::class,'update'])->name('transaction.update');
        Route::get('/delete/{id}', [Transaction::class,'destroy'])->name('transaction.delete');
    });
});
