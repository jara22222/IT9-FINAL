<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SuppliersController;
use Illuminate\Support\Facades\Route;



Route::get('/admin', function () {
    return view('admin.adm_main');
})->name('admin');

Route::get('/admin/products', function () {
    return view('admin.adm_products');
})->name('admin.products');

Route::get('/admin/products', [CategoriesController::class, 'show'])->name('admin.products');

Route::post('/add-category', [CategoriesController::class,'store']);

Route::get('/admin/employees', function () {
    return view('admin.adm_employees');
})->name('admin.employees');

Route::get('/admin/roles', function () {
    return view('admin.adm_roles');
})->name('admin.roles');

Route::get('/admin/suppliers', function () {
    return view('admin.adm_suppliers');
})->name('admin.suppliers');

Route::post('/add-suppliers', [SuppliersController::class,'store']);

Route::get('/admin/transactions', function () {
    return view('admin.adm_transaction_history');
})->name('admin.transactionsH');

Route::get('/admin/sales', function () {
    return view('admin.adm_sales_history');
})->name('admin.salesH');

Route::get('/admin/stocks', function () {
    return view('admin.adm_stocks_history');
})->name('admin.stocksH');


