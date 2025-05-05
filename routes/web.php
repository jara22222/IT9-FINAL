<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\Auth\LoginController;

// Public routes
Route::get('/', function () {
    return view('index');
})->name('home');

 Route::post('/', [LoginController::class, 'login'])->name('login.user');


 

// Authenticated routes (require login)
Route::middleware('auth')->group(function () {
  
    // Common authenticated user routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


    //employee-only routes (require employee role)
    Route::middleware(['role:employee'])->prefix('employee')->group(function () {
        // Employee dashboard
        Route::get('/', function () {
            return view('cashier.pos');
        })->name('employee.dashboard');
        
        // Products management
        
    });

    // Admin-only routes (require admin role)
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        // Admin dashboard
        Route::get('/', function () {
            return view('admin.adm_main');
        })->name('admin.dashboard');
         
        // Products management
        Route::get('/products', [ProductsController::class, 'index'])->name('show-products');
        Route::post('/products/create', [ProductsController::class, 'store'])->name('store-products');
        Route::patch('/products/{PID}', [ProductsController::class, 'update'])->name('update-products');
        Route::delete('/products/{PID}', [ProductsController::class, 'destroy'])->name('delete-products');
        
        // Categories management

        Route::get('/categories', [CategoriesController::class, 'show'])->name('show-categories');
        Route::post('/categories/add', [CategoriesController::class, 'store'])->name('add-category');
        Route::patch('/categories/delete/{ptid}', [CategoriesController::class, 'update'])->name('edit-categories');
        Route::delete('/categories/delete/{ptid}', [CategoriesController::class, 'destroy'])->name('delete-categories');
        
        // Suppliers management
        Route::get('/suppliers', [SuppliersController::class, 'show'])->name('suppliers');
        Route::post('/suppliers/add', [SuppliersController::class, 'store'])->name('add-suppliers');
        Route::patch('/suppliers/update/{sid}', [SuppliersController::class, 'update'])->name('update-suppliers');
        Route::delete('/suppliers/delete/{SID}', [SuppliersController::class, 'destroy'])->name('delete-suppliers');
        
        // History views
        Route::get('/sales_history', function () {
            return view('admin.adm_sales_history');
        })->name('sales_history');
        
        Route::get('/transaction_history', function () {
            return view('admin.adm_transaction_history');
        })->name('transaction_history');
        
        Route::get('/stock_history', function () {
            return view('admin.adm_stocks_history');
        })->name('stocks_history');
        
        // Roles management
        Route::get('/roles', [RolesController::class, 'show'])->name('roles');
        Route::post('/roles/addrole', [RolesController::class, 'store'])->name('add-roles');
        Route::patch('/roles/editrole/{rid}', [RolesController::class, 'update'])->name('role.editrole');
        Route::delete('/roles/deleterole/{rid}', [RolesController::class, 'destroy'])->name('role.deleterole');
        
        // Employees management
        Route::get('/employees', [EmployeesController::class, 'index'])->name('employees');
        Route::post('/employees/addemployees', [EmployeesController::class, 'store'])->name('add-employees');
        Route::patch('/employees/editemployees/{eid}', [EmployeesController::class, 'update'])->name('edit-employees');
        Route::delete('/employees/delete/{eid}', [EmployeesController::class, 'destroy'])->name('delete-employees');
        
        // User accounts
        Route::get('/accounts', [RegisteredUserController::class, 'index'])->name('accounts');
        Route::post('/accounts/{eid}', [RegisterUserController::class, 'register'])->name('register.user');
    });
    //not admin
    Route::middleware(['role:employee'])->prefix('employee')->group(function () {
        // Not admin dashboard
        Route::group(['prefix' => 'cashier'], function () {
            Route::get('/addproducts', function () {
                return view('cashier.pos_products');
            })->name('pos.products');
        });
    });
});

require __DIR__.'/auth.php';