<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MigrationHistoryController;

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
Route::controller(MigrationHistoryController::class)->group(function () {
    Route::get('/migration_history', 'index');
    Route::get('/migration_history/migrate', 'migrate');
    Route::get('/migration_history/rollback', 'rollback');
});
