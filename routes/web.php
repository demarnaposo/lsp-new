<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SkkniController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SkemaKkniController;
use App\Http\Controllers\UnitKompetensiController;
use App\Http\Controllers\ElemenKompetensiController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\KriteriaUnjukKerjaController;

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
        Route::get('/create', [SkemaKkniController::class, 'create'])->name('create');
        Route::post('/', [SkemaKkniController::class, 'store'])->name('store');

        // Jika ada route untuk edit atau update, bisa ditambahkan di sini
        // Route::get('/edit/{id}', [SkemaKkniController::class, 'edit'])->name('edit');
        // Route::put('/update/{id}', [SkemaKkniController::class, 'update'])->name('update');
    });

    Route::prefix('skkni')->name('skkni.')->group(function () {

        Route::get('/', [SkkniController::class, 'index'])->name('index');
        Route::get('/create', [SkkniController::class, 'create'])->name('create');
        Route::post('/', [SkkniController::class, 'store'])->name('store');
    });

    Route::get('/unit-kompetensi/{id}', [UnitKompetensiController::class,'index'])->name('unit-kompetensi.index');
    Route::get('/unit-kompetensi/{id}/create', [UnitKompetensiController::class,'create'])->name('unit-kompetensi.create');
    Route::post('/unit-kompetensi/{id}', [UnitKompetensiController::class,'store'])->name('unit-kompetensi.store');


    Route::get('/elemen-kompetensi/{id}', [ElemenKompetensiController::class,'index'])->name('elemen-kompetensi.index');
    Route::get('/elemen-kompetensi/{id}/create', [ElemenKompetensiController::class,'create'])->name('elemen-kompetensi.create');
    Route::post('/elemen-kompetensi/{id}', [ElemenKompetensiController::class,'store'])->name('elemen-kompetensi.store');
    Route::delete('/elemen-kompetensi/{id}', [ElemenKompetensiController::class, 'destroy'])->name('elemen-kompetensi.destroy');

    Route::get('/kriteria-unjukkerja/{id}', [KriteriaUnjukKerjaController::class,'index'])->name('kriteria-unjukkerja.index');




});




// Route::middleware('auth')->group(function () {
//     Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


//     Route::get('/user', [UserController::class, 'index'])->name('user.index');


// });



require __DIR__.'/auth.php';
