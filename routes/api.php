<?php

use App\Http\Controllers\API\SupplierController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\ProcurementRequestController;
use App\Http\Controllers\API\ProcurementRequestItemController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\WarehouseController;
use App\Models\ProcurementRequest;
use App\Models\Transaction;
use App\Models\TransactionItem;

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

// USER
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'get']);
    Route::get('all-user', [UserController::class, 'all']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('delete-user', [UserController::class, 'delete']);

    Route::get('supplier', [SupplierController::class, 'all']);
    Route::post('supplier', [SupplierController::class, 'add']);
    Route::post('update-supplier', [SupplierController::class, 'update']);
    Route::delete('delete-supplier', [SupplierController::class, 'delete']);

    Route::get('customer', [CustomerController::class, 'all']);
    Route::post('customer', [CustomerController::class, 'add']);
    Route::post('update-customer', [CustomerController::class, 'update']);
    Route::delete('delete-customer', [CustomerController::class, 'delete']);

    Route::get('warehouse', [WarehouseController::class, 'all']);
    Route::post('warehouse', [WarehouseController::class, 'add']);
    Route::post('update-warehouse', [WarehouseController::class, 'update']);
    Route::delete('delete-warehouse', [WarehouseController::class, 'delete']);

    Route::get('product', [ProductController::class, 'all']);
    Route::post('product', [ProductController::class, 'add']);
    Route::post('update-product', [ProductController::class, 'update']);
    Route::delete('delete-product', [ProductController::class, 'delete']);

    Route::get('procurement', [ProcurementRequestController::class, 'all']);
    Route::post('procurement', [ProcurementRequestController::class, 'add']);
    Route::post('update-procurement', [ProcurementRequestController::class, 'update']);
    Route::delete('delete-procurement', [ProcurementRequestController::class, 'delete']);

    Route::get('procurement-item', [ProcurementRequestItemController::class, 'all']);
    Route::post('procurement-item', [ProcurementRequestItemController::class, 'add']);
    Route::post('update-procurement-item', [ProcurementRequestItemController::class, 'update']);
    Route::delete('delete-procurement-item', [ProcurementRequestItemController::class, 'delete']);

    Route::get('transaction', [Transaction::class, 'all']);
    Route::post('transaction', [Transaction::class, 'add']);
    Route::post('update-transaction', [Transaction::class, 'update']);
    Route::delete('delete-transaction', [Transaction::class, 'delete']);

    Route::get('transaction-item', [TransactionItem::class, 'all']);
    Route::post('transaction-item', [TransactionItem::class, 'add']);
    Route::post('update-transaction-item', [TransactionItem::class, 'update']);
    Route::delete('delete-transaction-item', [TransactionItem::class, 'delete']);
});
