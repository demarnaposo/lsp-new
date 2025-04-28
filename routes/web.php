<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SkemaKkniController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/provinces', [LocationController::class, 'getProvinces']);
Route::get('/regencies/{province_id}', [LocationController::class, 'getRegencies']);
Route::get('/districts/{regency_id}', [LocationController::class, 'getDistricts']);
Route::get('/sub-districts/{district_id}', [LocationController::class, 'getSubDistricts']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {



    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index'); // Show profile
        Route::get('/{id}/edit', [ProfileController::class, 'edit'])->name('edit'); // Show edit form
        Route::put('/{id}', [ProfileController::class, 'update'])->name('update'); // Update profile
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy'); // Delete profile
    });


    Route::prefix('skema-kkni')->name('skema-kkni.')->group(function () {


        Route::get('/', [SkemaKkniController::class, 'index'])->name('index');

    });
});




// Route::middleware('auth')->group(function () {
//     Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


//     Route::get('/user', [UserController::class, 'index'])->name('user.index');


// });



require __DIR__.'/auth.php';
