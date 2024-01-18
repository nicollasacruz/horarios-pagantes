<?php

use App\Http\Controllers\FortuneOxController;
use App\Http\Controllers\FortuneTigerController;
use App\Http\Controllers\MrHallowWinController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\NinjaCrashController;
use App\Models\FortuneOx;
use App\Models\FortuneTiger;
use App\Models\MrHallowWin;
use App\Models\NinjaCrash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect('games');
});

// Route::get('/games', [GamesController::class, 'index'])->middleware(['auth', 'verified'])->name('games');
Route::get('/games', [NinjaCrashController::class, 'index'])->middleware(['auth', 'verified'])->name('games');

Route::get('/admin/users', function () {
    if (Auth::user()->role === 'admin') {
        $users = User::all(['name', 'contact', 'email']);
        return Inertia::render('UsersList', ['users' => $users]);
    }
    return redirect('games');
})->middleware(['auth', 'verified'])->name('users-list');

Route::get('/admin/users/export', [AdminController::class, 'exportUsers'])
->middleware(['auth', 'verified'])->name('users-export');

// Route::get('/games/fortune-tiger', [FortuneTigerController::class, 'index'])
// ->middleware(['auth', 'verified'])->name('fortune-tiger');

// Route::get('/games/fortune-ox', [FortuneOxController::class, 'index'])
// ->middleware(['auth', 'verified'])->name('fortune-ox');

// Route::get('/games/hallow-win', [MrHallowWinController::class, 'index'])
// ->middleware(['auth', 'verified'])->name('hallow-win');

// Route::get('/games/ninja-crash', [NinjaCrashController::class, 'index'])
// ->middleware(['auth', 'verified'])->name('ninja-crash');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
