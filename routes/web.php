<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(), // Add locale prefix to URLs
    ],
    
    function () { // Add a closure to wrap the routes
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



        // profile routes
        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });


    }
);




require __DIR__.'/auth.php';
