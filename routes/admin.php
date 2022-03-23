<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UtilisateurController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!d
|
*/

Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard.index');
Route::get('utilisateur', [AdminController::class, 'utilisateur'])->name('dashboard.utilisateur');

Route::get('getAllUser', [UtilisateurController::class, 'getAll'])->name('dashboard.utilisateur.getAll');
Route::get('getHisRole/{role_id}', [UtilisateurController::class, 'getHisRole'])->name('dashboard.utilisateur.getHisRole');
Route::get('getUserWithRole', [AdminController::class, 'getUserWithRole'])->name('dashboard.utilisateur.getUserWithRole');
Route::post('updateRole', [UtilisateurController::class, 'updateRole'])->name('dashboard.utilisateur.updateRole');




