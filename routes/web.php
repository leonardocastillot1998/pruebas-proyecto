<?php

use App\Http\Controllers\LandlordRentalRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalConfirmationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        $user = auth()->user();

        if ($user->role === 'admin') {
            return redirect('/admin');
        }

        if ($user->role === 'arrendador') {
            return redirect('/arrendador');
        }

        return redirect('/arrendatario');
    }

    return view('home');
});


Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect('/admin');
    }

    if ($user->role === 'arrendador') {
        return redirect('/arrendador');
    }

    return redirect('/arrendatario');
})->middleware('auth')->name('dashboard');

// 🔒 RUTAS PROTEGIDAS POR ROL

Route::middleware(['auth', 'role:admin'])->get('/admin', function () {
    return view('admin');
});

Route::middleware(['auth', 'role:arrendador'])->group(function () {
    Route::get('/arrendador', function () {
        return view('arrendador');
    });
    Route::get('/arrendador/solicitudes', [LandlordRentalRequestController::class, 'index'])->name('landlord.requests.index');
    Route::patch('/arrendador/solicitudes/{transaction}', [LandlordRentalRequestController::class, 'update'])->name('landlord.requests.update');
});

Route::middleware(['auth', 'role:arrendatario'])->group(function () {
    Route::get('/arrendatario', [RentalConfirmationController::class, 'index'])->name('rentals.create');
    Route::post('/arrendatario/confirmar', [RentalConfirmationController::class, 'store'])->name('rentals.store');
});


// PERFIL 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// SOLO PARA PREVIEW — borrar después
Route::get('/preview/reset-password', function () {
    return view('auth.reset-password', [
        'request' => request()
    ]);
});
require __DIR__.'/auth.php';
