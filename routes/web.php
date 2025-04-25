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

Route::pattern('id','[0-9]+');

// === AUTH ===
Route::get('login', [AuthController::class,'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

// === PUBLIC ROUTES (TANPA AUTH) ===
Route::get('/', [ProjectController::class, 'show'])->name('home'); // Ini untuk halaman utama dengan card project
Route::get('/project/{id}/apply', [ProjectController::class, 'apply'])->name('project.apply');
Route::post('/project/{id}/apply', [ProjectController::class, 'applyStore'])->name('project.apply.store');


// === ADMIN / PROTECTED ROUTES ===
Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');

    Route::prefix('level')->group(function(){
        Route::get('/', [LevelController::class, 'index'])->name('level.index');
        Route::get('/list', [LevelController::class, 'list'])->name('level.list');
        Route::get('/create', [LevelController::class, 'create'])->name('level.create');
        Route::post('/store', [LevelController::class, 'store'])->name('level.store');
        Route::get('/{id}/edit', [LevelController::class, 'edit'])->name('level.edit');
        Route::put('/update/{id}', [LevelController::class, 'update'])->name('level.update');
        Route::delete('/{id}', [LevelController::class, 'destroy'])->name('level.destroy');
    });

    Route::prefix('user')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/list', [UserController::class, 'list'])->name('user.list');
    });

    Route::prefix('category')->group(function(){
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/list', [CategoryController::class, 'list'])->name('category.list');
    });

    Route::prefix('project')->group(function(){
        Route::get('/', [ProjectController::class, 'index'])->name('project.index');
        Route::get('/list', [ProjectController::class, 'list'])->name('project.list');
        Route::get('/create', [ProjectController::class, 'create'])->name('project.create');
        Route::post('/store', [ProjectController::class, 'store'])->name('project.store');
        Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
        Route::put('/update/{id}', [ProjectController::class, 'update'])->name('project.update');
        Route::delete('/delete/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
    });
});
