<?php

use App\Http\Controllers\ComandaController;
use App\Http\Controllers\ProfileController;
use App\Models\Comanda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('index', ['username' => Auth::check() ? Auth::user() : null, 'searchShow' => false]);
});

Route::get('/comanda', [ComandaController::class, 'seeAll']);
Route::get('/comanda/{id}', [ComandaController::class, 'seeComanda'])->where(['id' => '[0-9]+']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('comanda/create', fn() => view('createComanda', ['username' => Auth::check() ? Auth::user() : null]));
    Route::post('comanda', [ComandaController::class, 'addComanda']);
    
    Route::get('comanda/own', [ComandaController::class, 'ownComandes']);

    Route::get('comanda/{id}/edit', [ComandaController::class, 'editComanda']);
    Route::put('comanda/{id}', [ComandaController::class, 'updateComanda']);

    Route::delete('comanda/{id}', [ComandaController::class, 'deleteComanda'])->where(['id' => '[0-9]+']);

});

require __DIR__.'/auth.php';
