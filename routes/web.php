<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrdersController;
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
use App\Http\Controllers\TransactionHistoryController;
use App\Models\Orders;

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


    // Admin-only routes (require admin role)
    Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {
        // Admin dashboard
        Route::get('/', function () {
            return view('admin.adm_main');
        })->name('admin.dashboard');
         
        // Products management
        Route::get('/admin/products', [AdminProductsController::class, 'admshow'])->name('show.products');
        Route::patch('/admin/products/update/{pid}', [AdminProductsController::class, 'admupdate'])->name('update.products');
        Route::delete('/aduri: min/products/delete/{pid}', [AdminProductsController::class, 'destroy'])->name('delete.products');
        
       
        // Categories management

        Route::get('/categories', [CategoriesController::class, 'show'])->name('show-categories');
        Route::post('/categories/add', [CategoriesController::class, 'store'])->name('add-category');
        Route::patch('/categories/delete/{ptid}', [CategoriesController::class, 'update'])->name('edit-categories');
        Route::delete('/categories/delete/{ptid}', [CategoriesController::class, 'destroy'])->name('delete-categories');
        
        // Suppliers management
        Route::get('/suppliers', [SuppliersController::class, 'show'])->name('suppliers');
        Route::post('/suppliers/add', [SuppliersController::class, 'store'])->name('add-suppliers');
        Route::patch('/suppliers/update/{sid}', [SuppliersController::class, 'update'])->name('update-suppliers');
        Route::delete('/suppliers/delete/{sid}', [SuppliersController::class, 'destroy'])->name('delete.suppliers');
        
        // History views
        Route::get('/sales_history', function () {
            return view('admin.adm_sales_history');
        })->name('sales_history');

        Route::get('/sales_history', [SuppliersController::class, 'show'])->name('suppliers');
        Route::get('/transacthistory', [TransactionHistoryController::class, 'admin_transaction_history'])->name('admin.transaction');
        Route::get('/saleshistory', [TransactionHistoryController::class, 'admin_sales_history'])->name('admin.sales');
          
      //Dashboard
        Route::get('/dashboard', [ DashboardController::class, 'getdata'])->name('dashboard.data');
          
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
         Route::delete('deleteUser/{id}', [RegisteredUserController::class, 'destroy'])->name('delete.user');
         Route::patch('updateUser/{id}', [RegisteredUserController::class, 'update'])->name('update.user');
    });






    //not admin
    Route::middleware(['auth','role:Employee,Manager'])->prefix('POS')->group(function () {

       
        // Not admin dashboard
      


            Route::get('/showproducts', [ProductsController::class, 'index'])->name('pos.showproducts');
            Route::get('/cashier', [ProductsController::class, 'posproducts'])->name('employee.dashboard');
            Route::post('/showproducts', [ProductsController::class, 'store'])->name('pos.addproducts');
            Route::patch('/addstock/{pid}', [ProductsController::class, 'edit'])->name('pos.addstock');
            Route::post('/orders', [OrdersController::class, 'index'])->name('pos.orders');
            Route::get('/transactionHistory', [TransactionHistoryController::class, 'index'])->name('pos.transaction_history');
          
            
        
    });
});

require __DIR__.'/auth.php';