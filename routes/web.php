<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/import', [ExcelController::class, 'import'])->name('import.user');

Route::post('/import-excel', [ExcelController::class, 'importExcel'])->name('import.excel');
