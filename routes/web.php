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
    // return view('welcome');
    return redirect('/admin/dashboard');
});

/*
 Route::get('/dashboard', function () {
     return view('dashboard');
 })->middleware(['auth'])->name('dashboard');
*/

require __DIR__.'/auth.php';

// Admin Routes

Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'login'])->name('Sign In');
    Route::match(['GET', 'POST'], 'login', [AdminController::class, 'login'])->name('Sign In');
    Route::get('error/{slug}', [AdminController::class, 'error'])->name('Error');

    Route::group(['middleware' => ['admin']], function() {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('Dashboard');
        Route::match(['GET', 'POST'], 'settings', [AdminController::class, 'settings'])->name('Settings');
        Route::match(['GET', 'POST'], 'profile', [AdminController::class, 'profile'])->name('Profile');
        Route::match(['GET', 'POST'], 'options', [AdminController::class, 'options'])->name('Options');
        Route::get('logout', [AdminController::class, 'logout']);

        Route::match(['GET', 'POST'], 'admin-password', [AdminController::class, 'updateAdminPassword'])->name('Update Admin Password');
        Route::match(['GET', 'POST'], 'admin-details', [AdminController::class, 'updateAdminDetails'])->name('Update Admin Details');
        Route::post('check-current-password', [AdminController::class, 'checkCurrentPassword']);
        Route::get('delete-notes', [AdminController::class, 'deleteAdminNotes']);
        Route::get('delete-admin-image', [AdminController::class, 'deleteAdminImage']);

        Route::match(['GET', 'POST'], 'vendor-update/{slug}', [AdminController::class, 'updateVendorDetails'])->name('Update Vendor Details');
        Route::get('fix-vendor', [AdminController::class, 'fixVendorStatus']);
        Route::get('delete-vendor-notes/{slug}', [AdminController::class, 'deleteVendorNotes']);
        Route::get('delete-vendor-image/{slug}', [AdminController::class, 'deleteVendorImages']);
    });

});
