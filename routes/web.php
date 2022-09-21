<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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
    return view('welcome');
});

/*
 Route::get('/dashboard', function () {
     return view('dashboard');
 })->middleware(['auth'])->name('dashboard');
*/

require __DIR__.'/auth.php';

// Admin Routes

Route::prefix('/admin')->group(function () {
    Route::match(['GET', 'POST'], 'login', [AdminController::class, 'login'])->name('Sign In');

    Route::group(['middleware' => ['admin']], function() {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('Dashboard');
        Route::get('logout', [AdminController::class, 'logout']);

        Route::match(['GET', 'POST'], 'admin-password', [AdminController::class, 'updateAdminPassword'])->name('Update Admin Password');
        Route::match(['GET', 'POST'], 'admin-details', [AdminController::class, 'updateAdminDetails'])->name('Update Admin Details');
        Route::post('check-current-password', [AdminController::class, 'checkCurrentPassword']);
    });

});
