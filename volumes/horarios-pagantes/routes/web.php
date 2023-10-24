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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return redirect('games');
});

Route::get('/games', function () {
    return Inertia::render('Games');
})->middleware(['auth', 'verified'])->name('games');

Route::get('/admin/users', function () {
    if (Auth::user()->role === 'admin') {
        $users = User::all(['name', 'contact', 'email']);
        return Inertia::render('UsersList', ['users' => $users]);
    }
    return redirect('games');
})->middleware(['auth', 'verified'])->name('users-list');

// Route::get('/admin/users/export', function () {
//     if (Auth::user()->role === 'admin') {
//         $users = User::all(['name', 'contact', 'email']);
//         return Excel::download(new UsersExport($users), 'users.xlsx');
//     }
//     return redirect('games');
// })->middleware(['auth', 'verified'])->name('users-export');

Route::get('/games/fortune-tiger', [FortuneTigerController::class, 'index'])
->middleware(['auth', 'verified'])->name('fortune-tiger');

Route::get('/games/fortune-ox', [FortuneOxController::class, 'index'])
->middleware(['auth', 'verified'])->name('fortune-ox');

Route::get('/games/hallow-win', [MrHallowWinController::class, 'index'])
->middleware(['auth', 'verified'])->name('hallow-win');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
