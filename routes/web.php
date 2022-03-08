<?php

use App\Events\test;
use Inertia\Inertia;
use App\Events\RondeAdded;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarnsController;
use App\Http\Controllers\RondesController;
use App\Http\Controllers\DoubleAccountController;

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

Route::get('/', [RondesController::class, 'index'])->middleware(['auth', 'verified', 'NewAuth'])->name('dashboard');

Route::get('/rondelist', [RondesController::class, 'getListRonde'])->middleware(['auth','NewAuth'])->name('getListRonde');
Route::get('/getRole', [UserController::class, 'getRole'])->middleware(['auth','NewAuth'])->name('getRoleUser');
Route::post('/postRonde', [RondesController::class, 'postRonde'])->middleware(['auth','NewAuth'])->name('postRonde');

Route::get('/double-compte', [DoubleAccountController::class, 'index'])->middleware(['auth', 'NewAuth'])->name('dashboard.doubleacc');
Route::get('/avertissement', [WarnsController::class, 'index'])->middleware(['auth', 'NewAuth'])->name('dashboard.warns');


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});


require __DIR__.'/auth.php';
