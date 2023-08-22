<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdminRole;
use App\Http\Middleware\CheckUserRole;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', CheckAdminRole::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');
});

Route::middleware(['auth', CheckUserRole::class])->group(function () {
    Route::get('/make-quiz', function () {
        return view('make-quiz');
    })->middleware(['verified'])->name('make-quiz');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Redireccionar usuarios tipo "user" al perfil después de iniciar sesión
// Route::middleware('auth')->get('/home', function () {
//     if (Auth::user()->role === 'user') {
//         return redirect()->route('profile.edit');
//     } else {
//         return redirect()->route('dashboard');
//     }
// });


require __DIR__.'/auth.php';
