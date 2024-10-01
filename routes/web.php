<?php

use App\Http\Controllers\ClientsReportsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceArchiveController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoicesReportsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UsersController;
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
    Route::get('invoices.export',[InvoiceController::class,'export'])->name('invoices.export');
    Route::get('get_invoices/{type}',[InvoiceController::class,'get_invoices']);
    //get invoices archive
    Route::resource('invoices_archive',InvoiceArchiveController::class);
    Route::get('MarkAsRead_all',[InvoiceController::class,'MarkAsRead_all'])->name('MarkAsRead_all');

    //Attachment Links
    Route::get('viewFile/{invoice_number}/{file_name}',[InvoiceController::class , 'view_file']);
    Route::get('downloadFile/{invoice_number}/{file_name}',[InvoiceController::class , 'download_file']);
    Route::delete('delete_file',[InvoiceController::class,'delete_file'])->name('delete_file');
    Route::post('uploadFile',[InvoiceController::class , 'uploadFile']);
    Route::get('Print_invoice/{id}',[InvoiceController::class,'print_invoice']);
    Route::get('export_invoices',[InvoiceController::class,'export']);
    //get section products
    Route::get('/section/{id}',[InvoiceController::class,'getProducts']);
    //ٌroles routes
    Route::resource('roles', RoleController::class);
    //Users Routes
    Route::resource('users', UsersController::class);
    //reports routes
    Route::get('invoices_report',[InvoicesReportsController::class,'index']);
    Route::get('customers_report',[ClientsReportsController::class,'index']);
    // search in invoices routes
    Route::post('Search_invoices',[InvoicesReportsController::class , 'search_reports']);
    Route::post('Search_customers',[ClientsReportsController::class , 'search_customers']);
});
