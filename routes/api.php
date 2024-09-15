<?php

use App\Http\Controllers\API\v1\CashTransactionStatisticController;
use App\Http\Controllers\API\v1\SettingSupplierController;
use App\Http\Controllers\API\v1\DataTables\AdministratorController;
use App\Http\Controllers\API\v1\DataTables\CashTransactionController;
use App\Http\Controllers\API\v1\DataTables\SchoolClassController;
use App\Http\Controllers\API\v1\DataTables\SchoolMajorController;
use App\Http\Controllers\API\v1\DataTables\StudentController;
use App\Http\Controllers\API\v1\DataTables\SettingController;
use App\Http\Controllers\API\v1\DataTables\SupplierController;
use App\Http\Controllers\API\v1\DataTables\ItemController;
use App\Http\Controllers\API\v1\DataTables\OatLokasiController;
use App\Http\Controllers\API\v1\DataTables\CustomerController;
use App\Http\Controllers\API\v1\DataTables\SphController;
use App\Http\Controllers\API\v1\DataTables\PurchaseOrderController;
use App\Http\Controllers\API\v1\DataTables\PoTransportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1/')->name('api.v1.')->group(function () {
    Route::get('/cash-transactions/statistics', CashTransactionStatisticController::class)
        ->name('cash-transactions.statistics');
    Route::get('/supplier-setting/{id}', [SettingSupplierController::class, 'getSupplierById'])
        ->name('supplier-setting');
    Route::post('/supplier-setting', [SettingSupplierController::class, 'generatePoNumber'])
        ->name('supplier-setting.generate-po-number');

    Route::prefix('datatable/')->name('datatables.')->group(function () {
        Route::apiResources([
            '/school-classes' => SchoolClassController::class,
            '/school-majors' => SchoolMajorController::class,
            '/administrators' => AdministratorController::class,
            '/students' => StudentController::class,
            '/cash-transactions' => CashTransactionController::class,
            '/settings' => SettingController::class,
            '/supplier' => SupplierController::class,
            '/item' => ItemController::class,
            '/oatlokasi' => OatLokasiController::class,
            '/customer' => CustomerController::class,
            '/sph' => SphController::class,
            '/purchase-order' => PurchaseOrderController::class,
            '/po-transport' => PoTransportController::class,
        ]);
        // Route for file upload
        Route::post('/sph/upload', [SphController::class, 'upload'])->name('sph.upload');
        Route::post('/sph/download', [SphController::class, 'download'])->name('sph.download');
        Route::post('/sph/get-total', [SphController::class, 'getTotal'])->name('sph.get-total');
        Route::post('/purchase-order/upload', [PurchaseOrderController::class, 'upload'])->name('purchase-order.upload');
        Route::post('/purchase-order/download', [PurchaseOrderController::class, 'download'])->name('purchase-order.download');
        Route::post('/po-transport/get-total', [PoTransportController::class, 'total'])->name('po-transport.get-total');
        Route::post('/po-transport/download', [PoTransportController::class, 'download'])->name('po-transport.download');
    });
});
