<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CashTransactionController;
use App\Http\Controllers\CashTransactionFilterController;
use App\Http\Controllers\CashTransactionReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\SchoolMajorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OatLokasiController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SphController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\PoTransportController;
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

Route::middleware('guest')->group(function () {
    Route::get('/', fn() => redirect()->route('dashboard'));

    Route::get('/login', [AuthenticationController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/school-classes', SchoolClassController::class)->name('school-classes.index');
    Route::get('/school-majors', SchoolMajorController::class)->name('school-majors.index');
    Route::get('/administrators', AdministratorController::class)->name('administrators.index');
    Route::get('/students', StudentController::class)->name('students.index');

    Route::get('/cash-transactions', CashTransactionController::class)->name('cash-transactions.index');
    Route::get('/cash-transactions/report', CashTransactionReportController::class)->name('cash-transactions.report.index');
    Route::get('/cash-transactions/filter', CashTransactionFilterController::class)->name('cash-transactions.filter.index');

    // Route untuk tambahan controller

    Route::get('/settings', SettingController::class)->name('settings.index');
    Route::get('/supplier', SupplierController::class)->name('supplier.index');
    Route::get('/item', ItemController::class)->name('item.index');
    Route::get('/oatlokasi', OatLokasiController::class)->name('oatlokasi.index');
    Route::get('/customer', CustomerController::class)->name('customer.index');
    Route::get('/sph', SphController::class)->name('sph.index');
    Route::get('/purchase-order', PurchaseOrderController::class)->name('purchase-order.index');
    Route::get('/po-transport', PoTransportController::class)->name('po-transport.index');


    // Route untuk Master Data

});
