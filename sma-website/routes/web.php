<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ElearningController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\LibraryController;
use App\Http\Middleware\AdminMiddleware;


// Home Route
Route::get('/', function () {
    return view('home');
})->name('home');

// Basic Pages Routes
Route::get('/sejarah', function () {
    return view('sejarah');
});

Route::get('/visimisi', function () {
    return view('visimisi');
});

// PPDB Public Routes
Route::get('/ppdb', [PpdbController::class, 'index'])->name('ppdb.index');
Route::post('/ppdb/check', [PpdbController::class, 'check'])->name('ppdb.check');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// E-Learning Routes
Route::prefix('e-learning')->middleware('auth')->group(function () {
    // ... hapus semua route e-learning
});

// Admin Routes
Route::prefix('admin')->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('/admin/guru', [AdminController::class, 'guruIndex'])->name('admin.guru.index');
    Route::post('/admin/guru/store', [AdminController::class, 'storeGuru'])->name('admin.guru.store');
    Route::put('/admin/guru/update/{id}', [AdminController::class, 'updateGuru'])->name('admin.guru.update');
    Route::delete('/admin/guru/delete/{id}', [AdminController::class, 'deleteGuru'])->name('admin.guru.delete');

    Route::get('/e-news', [AdminController::class, 'enews'])->name('admin.enews');
    Route::post('/e-news', [AdminController::class, 'storeNews'])->name('admin.enews.store');
    Route::put('/e-news/{news}', [AdminController::class, 'newsUpdate'])->name('admin.enews.update');
    Route::delete('/e-news/{news}', [AdminController::class, 'newsDestroy'])->name('admin.enews.destroy');
    
    Route::get('/prestasi', [AdminController::class, 'prestasi'])->name('admin.prestasi');
    Route::post('/prestasi', [AdminController::class, 'storePrestasiAdmin'])->name('admin.prestasi.store');
    Route::put('/prestasi/{prestasi}', [AdminController::class, 'prestasiUpdate'])->name('admin.prestasi.update');
    Route::delete('/prestasi/{prestasi}', [AdminController::class, 'prestasiDestroy'])->name('admin.prestasi.destroy');
    
    Route::get('/ppdb', [PpdbController::class, 'adminIndex'])->name('admin.ppdb');
    Route::post('/ppdb/store', [PpdbController::class, 'store'])->name('admin.ppdb.store');
    Route::post('/ppdb/import', [PpdbController::class, 'import'])->name('admin.ppdb.import');
    Route::delete('/ppdb/{ppdb}', [PpdbController::class, 'destroy'])->name('admin.ppdb.destroy');

    Route::get('/e-library', [AdminController::class, 'elibrary'])->name('admin.elibrary');
    Route::put('/elibrary/approve/{id}', [AdminController::class, 'approveRequest'])->name('admin.elibrary.approve');
    Route::delete('/elibrary/decline/{id}', [AdminController::class, 'declineRequest'])->name('admin.elibrary.decline');
});

// Public Routes

Route::get('/guru', [HomeController::class, 'guruPage'])->name('guru.page');
Route::get('/guru/{teacher}', [HomeController::class, 'showTeacher'])->name('guru.show');

Route::get('/prestasi', function () {
    $prestasis = \App\Models\Prestasi::orderBy('created_at', 'desc')->get();
    return view('prestasi', compact('prestasis'));
});

Route::get('/e-news', function () {
    $news = \App\Models\News::orderBy('created_at', 'desc')->get();
    return view('enews', compact('news'));
});

Route::middleware('auth')->group(function () {
    Route::get('/e-library', [LibraryController::class, 'index'])->name('library.elibrary');
    Route::post('/e-library/request/{bookId}', [LibraryController::class, 'requestBook'])->name('library.elibrary.request');
});
