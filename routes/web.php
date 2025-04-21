<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;

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

Route::get('/',[DashboardController::class, 'index']);


Route::group(['prefix'=> 'level'], function(){
        Route::get('/', [LevelController::class, 'index'])->name('level.index');
        Route::get('/list', [LevelController::class, 'list'])->name('level.list');
    
        // Tambahan routing create, store, edit, update, delete
        Route::get('/create', [LevelController::class, 'create'])->name('level.create');
        Route::post('/store', [LevelController::class, 'store'])->name('level.store');
        Route::get('/edit/{id}', [LevelController::class, 'edit'])->name('level.edit');
        Route::post('/update/{id}', [LevelController::class, 'update'])->name('level.update');
        Route::delete('/delete/{id}', [LevelController::class, 'destroy'])->name('level.destroy');
});


Route::group(['prefix'=> 'user'], function(){
    Route::get('/', [UserController::class, 'index']);
    Route::get('/list',[UserController::class, 'list']);
});

Route::group(['prefix'=> 'category'], function(){
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/list',[CategoryController::class, 'list']);
});