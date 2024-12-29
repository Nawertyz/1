<?php

use App\Http\Controllers\Api\Document\ApiDocumentController;
use App\Http\Controllers\Api\Tool\ToolController;
use App\Http\Controllers\Guest\Service\OrderServiceController;
use App\Http\Controllers\Guest\Service\Order1ServiceController;
use App\Http\Controllers\Guest\Service\ApiOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/v2', [ApiOrderController::class, 'createOrder'])->name('api.service.order');

Route::prefix('/service')->group(function(){

    Route::post('/{social}/{service}/order', [OrderServiceController::class, 'createOrder'])->name('api.service.order');
    Route::post('/{chuyenmuc}/order', [Order1ServiceController::class, 'createOrder'])->name('api.chuyenmuc.order');
});





Route::middleware('api.auth')->group(function(){
    Route::post('/me', [ApiDocumentController::class, 'me'])->name('api.me');
    Route::post('/service/prices', [ApiDocumentController::class, 'servicePrices'])->name('api.service.prices');
    Route::post('/get/orders', [ApiDocumentController::class, 'getOrders'])->name('api.get.orders');

    Route::prefix('/order')->group(function(){
        Route::post('/refund', [ApiDocumentController::class, 'orderRefund'])->name('api.order.refund');
        Route::post('/giahan', [ApiDocumentController::class, 'orderGiahan'])->name('api.order.giahan');
        Route::post('/warranty', [ApiDocumentController::class, 'orderWarranty'])->name('api.order.warranty');
    });
});


Route::prefix('/tool')->group(function(){
    Route::post('/get-uid', [ToolController::class, 'getUid'])->name('api.tool.get-uid');
});

