<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProjectController;
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


Route::pattern('id','[0-9]+');

Route::get('login', [AuthController::class,'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])-> group(function(){
 
    Route::get('/',[DashboardController::class, 'index']);
   
});


Route::get('/dashboard',[DashboardController::class, 'dashboard']);

Route::group(['prefix'=> 'level'], function(){
        Route::get('/', [LevelController::class, 'index'])->name('level.index');
        Route::get('/list', [LevelController::class, 'list'])->name('level.list');
    
        // Tambahan routing create, store, edit, update, delete
        Route::get('/create', [LevelController::class, 'create'])->name('level.create');
        Route::post('/store', [LevelController::class, 'store'])->name('level.store');
        Route::get('/{id}/edit', [LevelController::class, 'edit'])->name('level.edit');
        Route::put('/update/{id}', [LevelController::class, 'update'])->name('level.update');
        Route::delete('/{id}', [LevelController::class, 'destroy'])->name('level.destroy');
});


Route::group(['prefix'=> 'user'], function(){
    Route::get('/', [UserController::class, 'index']);
    Route::get('/list',[UserController::class, 'list']);
});

Route::group(['prefix'=> 'category'], function(){
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/list',[CategoryController::class, 'list']);
});

Route::group(['prefix'=> 'project'], function() {
    Route::get('/',[ProjectController::class,'index'])->name('project.index');
    Route::get('/list', [ProjectController::class, 'list'])->name('project.list');

    Route::get('/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/store', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/update/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/delete/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
    
});