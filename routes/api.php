<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CatalogController;
use App\Http\Controllers\Api\CatalogManagementController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Middleware\AuthenticateCashier;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function (): void {
    Route::get('/catalog', [CatalogController::class, 'index']);
    Route::get('/menu/{menuItem}', [CatalogController::class, 'show']);
    Route::get('/addons', [CatalogController::class, 'addons']);
    Route::post('/orders', [OrderController::class, 'store'])->middleware('throttle:10,1');
    Route::get('/orders/track', [OrderController::class, 'track'])->middleware('throttle:30,1');

    Route::post('/cashier/login', [AuthController::class, 'login'])->middleware('throttle:5,1');

    Route::middleware(AuthenticateCashier::class)->prefix('cashier')->group(function (): void {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'me']);

        Route::get('/dashboard', [ReportController::class, 'dashboard']);
        Route::get('/reports/sales', [ReportController::class, 'sales']);

        Route::get('/orders', [OrderController::class, 'index']);
        Route::get('/orders/{order}', [OrderController::class, 'show']);
        Route::patch('/orders/{order}', [OrderController::class, 'update']);
        Route::post('/orders/{order}/payment-proof', [OrderController::class, 'uploadPaymentProof']);

        Route::get('/categories', [CatalogManagementController::class, 'categories']);
        Route::get('/categories/{category}', [CatalogManagementController::class, 'category']);
        Route::post('/categories', [CatalogManagementController::class, 'saveCategory']);
        Route::put('/categories/{category}', [CatalogManagementController::class, 'saveCategory']);
        Route::delete('/categories/{category}', [CatalogManagementController::class, 'deleteCategory']);

        Route::get('/menu-items', [CatalogManagementController::class, 'menuItems']);
        Route::get('/menu-items/{menuItem}', [CatalogManagementController::class, 'menuItem']);
        Route::post('/menu-items', [CatalogManagementController::class, 'saveMenuItem']);
        Route::put('/menu-items/{menuItem}', [CatalogManagementController::class, 'saveMenuItem']);
        Route::delete('/menu-items/{menuItem}', [CatalogManagementController::class, 'deleteMenuItem']);
        Route::post('/menu-items/{menuItem}/image', [CatalogManagementController::class, 'uploadMenuItemImage']);
        Route::delete('/menu-items/{menuItem}/image', [CatalogManagementController::class, 'deleteMenuItemImage']);

        Route::get('/addons', [CatalogManagementController::class, 'addons']);
        Route::get('/addons/{addon}', [CatalogManagementController::class, 'addon']);
        Route::post('/addons', [CatalogManagementController::class, 'saveAddon']);
        Route::put('/addons/{addon}', [CatalogManagementController::class, 'saveAddon']);
        Route::delete('/addons/{addon}', [CatalogManagementController::class, 'deleteAddon']);
    });
});
