<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

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
Route::resource('settings', SettingsController::class)
    ->only(['index', 'show', 'update'])
    ->middleware(['auth', 'verified'])
    ->names([
        'index' => 'settings.index',
        'show' => 'settings.show',
        'update' => 'settings.update',
    ]);

Route::get('/dashboard', function () {
    $user = auth()->user();
    return view('dashboard', ['hyperlink' => $user->hyperlink, 'color' => $user->color]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
