<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TeamTournamentController;
use App\Http\Controllers\Admin\TournamentController;


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
    return view('admin.layouts.master');
});
Route::get('/search', [PlayerController::class, 'search'])->name('players.search');
// thùng rác 
Route::get('/trash', [PlayerController::class, 'trash'])->name('players.trash');
// khôi phục 
Route::get('/restore/{id}', [PlayerController::class, 'restore'])->name('players.restore');
// xóa vĩnh viễn 
Route::get('/deleteforever/{id}', [PlayerController::class, 'deleteforever'])->name('players.deleteforever');

Route::group(['prefix' => 'players'], function () {
    Route::get('/', [PlayerController::class, 'index'])->name('players.index');
    Route::get('create', [PlayerController::class, 'create'])->name('players.create');
    Route::post('/', [PlayerController::class, 'store'])->name('players.store');
    Route::get('/{id}', [PlayerController::class, 'show'])->name('players.show');
    Route::get('/{id}/edit', [PlayerController::class, 'edit'])->name('players.edit');
    Route::put('/{id}', [PlayerController::class, 'update'])->name('players.update');
    Route::delete('/{id}', [PlayerController::class, 'destroy'])->name('players.destroy');
});

Route::resource('teams', TeamController::class);
Route::resource('team_tournament', TeamTournamentController::class);
Route::resource('tournaments', TournamentController::class);
