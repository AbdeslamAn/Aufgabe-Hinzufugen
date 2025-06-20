<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AufgabeController;
use App\Http\Controllers\TrashedNoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::resource('aufgabes', AufgabeController::class)->middleware('auth');


// Method 1
/*
Route::get('/trashed', [TrashedNoteController::class, 'index'])->middleware('auth')->name('trashed.index');

Route::get('/trashed/{aufgabe}', [TrashedNoteController::class, 'show'])->withTrashed()->middleware('auth')->name('trashed.show');

Route::put('/trashed/{aufgabe}', [TrashedNoteController::class, 'update'])->withTrashed()->middleware('auth')->name('trashed.update');

Route::delete('/trashed/{aufgabe}', [TrashedNoteController::class, 'destroy'])->withTrashed()->middleware('auth')->name('trashed.destroy');
*/

// Or

Route::prefix('/trashed')->name('trashed.')->middleware('auth')->group(function ()
{
    Route::get('/', [TrashedNoteController::class, 'index'])->name('trashed.index');
    Route::get('/{aufgabe}', [TrashedNoteController::class, 'show'])->withTrashed()->name('.show');
    Route::put('/{aufgabe}', [TrashedNoteController::class, 'update'])->withTrashed()->name('.update');
    Route::delete('/{aufgabe}', [TrashedNoteController::class, 'destroy'])->withTrashed()->name('.destroy');
});
