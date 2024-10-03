<?php

use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;

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



Route::post('/import-csv', [ImportController::class, 'importCSV'])->name('import.csv');

Route::get('/import-csv-show', [ImportController::class, 'showImportForm'])->name('show.import.form');

Route::get('/export-pdf', [ExportController::class, 'exportPDF'])->name('export.pdf');

Route::get('/export-csv', [ExportController::class, 'exportCsv'])->name('export.csv');

Route::get('/companies/print', [ExportController::class, 'print'])->name('print');

Route::get('/export-excel', [ExportController::class, 'exportExcel'])->name('export.excel');
