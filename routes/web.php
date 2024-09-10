<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceArchiveController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use App\Models\Invoices_Details;

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

//stop register route
Auth::routes(['register' => false]);
//start the main routes
Route::middleware(['auth'])->group(function () {
    
    Route::get('/', [HomeController::class, 'index'])->name('home');
    //Sections Routes
    Route::resource('sections', SectionController::class)->except('show');
    //products routes
    Route::resource('products', ProductController::class)->except('show');
    //Inovices Route
    Route::resource('invoices', InvoiceController::class);
    //get invoices archive
    Route::resource('invoices_archive',InvoiceArchiveController::class);
    /*Route::get('invoices_archive',[InvoicesArchiveController::class,'index']);
    Route::get('show_invoice/{id}',[InvoicesArchiveController::class,'show_invoice'])->name('show_invoice');
    Route::get('delete_invoice/{id}',[InvoicesArchiveController::class, 'destroy'])->name('delete_invoice');
    Route::get('restore_invoice/{id}',[InvoicesArchiveController::class,'restore_invoice'])->name('restore_invoice');*/
    //Attachment Links
    Route::get('viewFile/{invoice_number}/{file_name}',[InvoiceController::class , 'view_file']);
    Route::get('downloadFile/{invoice_number}/{file_name}',[InvoiceController::class , 'download_file']);
    Route::delete('delete_file',[InvoiceController::class,'delete_file'])->name('delete_file');
    Route::post('uploadFile',[InvoiceController::class , 'uploadFile']);
    //get section products
    Route::get('/section/{id}',[InvoiceController::class,'getProducts']);
});
