<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/', [ProductController::class,'index'])->name('/');
    Route::delete('/delete/{product}', [ProductController::class,'destroy'])->name('product.destroy');
    Route::get('/products/excel-export', [ProductController::class,'excelExport']);
    Route::get('/products/pdf-export', [ProductController::class,'pdfExport']);
});

require __DIR__.'/auth.php';
