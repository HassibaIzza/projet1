<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;

Route::get('/', function () {
    return view('auth.login');
});

// dashboard routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect(auth()->user()->role === 'admin' ? '/admin/dashboard' : '/agent/dashboard');
    })->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/agent/dashboard', function () {
            return view('agent.dashboard');
        })->name('agent.dashboard');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





Route::get('/redirect', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif (auth()->user()->role === 'agent') {
        return redirect()->route('agent.dashboard');
    }
    return abort(403);
})->middleware(['auth']);


require __DIR__.'/auth.php';
setlocale('ar');