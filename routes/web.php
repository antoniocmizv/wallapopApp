<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ImageController;


Route::get('/', [SaleController::class, 'index']); // Página principal
Route::resource('sales', SaleController::class); // CRUD de ventas
Route::resource('categories', CategoryController::class); // CRUD de categorías
Route::resource('settings', SettingController::class); // Configuración (admin)
Route::resource('images', ImageController::class); // Gestión de imágenes
