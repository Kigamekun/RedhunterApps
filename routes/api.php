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
        Route::get('/', [Appointment::class,'index'])->name('plants.index');
        Route::get('/create', [Appointment::class,'create'])->name('plants.create');
        Route::post('/store', [Appointment::class,'store'])->name('plants.store');
        Route::get('/edit/{id}', [Appointment::class,'edit'])->name('plants.edit');
        Route::post('/update/{id}', [Appointment::class,'update'])->name('plants.update');
        Route::get('/delete/{id}', [Appointment::class,'destroy'])->name('plants.delete');
    });


    Route::prefix('batch')->group(function () {
        Route::get('/', [BatchController::class,'index'])->name('plants.index');
        Route::get('/create', [BatchController::class,'create'])->name('plants.create');
        Route::post('/store', [BatchController::class,'store'])->name('plants.store');
        Route::get('/edit/{id}', [BatchController::class,'edit'])->name('plants.edit');
        Route::post('/update/{id}', [BatchController::class,'update'])->name('plants.update');
        Route::get('/delete/{id}', [BatchController::class,'destroy'])->name('plants.delete');
    });


    Route::prefix('consultation')->group(function () {
        Route::get('/', [ConsultationController::class,'index'])->name('plants.index');
        Route::get('/create', [ConsultationController::class,'create'])->name('plants.create');
        Route::post('/store', [ConsultationController::class,'store'])->name('plants.store');
        Route::get('/edit/{id}', [ConsultationController::class,'edit'])->name('plants.edit');
        Route::post('/update/{id}', [ConsultationController::class,'update'])->name('plants.update');
        Route::get('/delete/{id}', [ConsultationController::class,'destroy'])->name('plants.delete');
    });

    Route::prefix('journal')->group(function () {
        Route::get('/', [JournalController::class,'index'])->name('plants.index');
        Route::get('/create', [JournalController::class,'create'])->name('plants.create');
        Route::post('/store', [JournalController::class,'store'])->name('plants.store');
        Route::get('/edit/{id}', [JournalController::class,'edit'])->name('plants.edit');
        Route::post('/update/{id}', [JournalController::class,'update'])->name('plants.update');
        Route::get('/delete/{id}', [JournalController::class,'destroy'])->name('plants.delete');
    });


    Route::prefix('level')->group(function () {
        Route::get('/', [LevelController::class,'index'])->name('plants.index');
        Route::get('/create', [LevelController::class,'create'])->name('plants.create');
        Route::post('/store', [LevelController::class,'store'])->name('plants.store');
        Route::get('/edit/{id}', [LevelController::class,'edit'])->name('plants.edit');
        Route::post('/update/{id}', [LevelController::class,'update'])->name('plants.update');
        Route::get('/delete/{id}', [LevelController::class,'destroy'])->name('plants.delete');
    });


    Route::prefix('module')->group(function () {
        Route::get('/', [ModuleController::class,'index'])->name('plants.index');
        Route::get('/create', [ModuleController::class,'create'])->name('plants.create');
        Route::post('/store', [ModuleController::class,'store'])->name('plants.store');
        Route::get('/edit/{id}', [ModuleController::class,'edit'])->name('plants.edit');
        Route::post('/update/{id}', [ModuleController::class,'update'])->name('plants.update');
        Route::get('/delete/{id}', [ModuleController::class,'destroy'])->name('plants.delete');
    });


    Route::prefix('notification')->group(function () {
        Route::get('/', [NotificationController::class,'index'])->name('plants.index');
        Route::get('/create', [NotificationController::class,'create'])->name('plants.create');
        Route::post('/store', [NotificationController::class,'store'])->name('plants.store');
        Route::get('/edit/{id}', [NotificationController::class,'edit'])->name('plants.edit');
        Route::post('/update/{id}', [NotificationController::class,'update'])->name('plants.update');
        Route::get('/delete/{id}', [NotificationController::class,'destroy'])->name('plants.delete');
    });


    Route::prefix('task')->group(function () {
        Route::get('/', [TaskController::class,'index'])->name('plants.index');
        Route::get('/create', [TaskController::class,'create'])->name('plants.create');
        Route::post('/store', [TaskController::class,'store'])->name('plants.store');
        Route::get('/edit/{id}', [TaskController::class,'edit'])->name('plants.edit');
        Route::post('/update/{id}', [TaskController::class,'update'])->name('plants.update');
        Route::get('/delete/{id}', [TaskController::class,'destroy'])->name('plants.delete');
    });


    Route::prefix('transaction')->group(function () {
        Route::get('/', [Transaction::class,'index'])->name('plants.index');
        Route::get('/create', [Transaction::class,'create'])->name('plants.create');
        Route::post('/store', [Transaction::class,'store'])->name('plants.store');
        Route::get('/edit/{id}', [Transaction::class,'edit'])->name('plants.edit');
        Route::post('/update/{id}', [Transaction::class,'update'])->name('plants.update');
        Route::get('/delete/{id}', [Transaction::class,'destroy'])->name('plants.delete');
    });
});
