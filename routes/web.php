<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;

// redirect to the login form when opens page
Route::get('/', function () {
    return redirect()->route('login.form');
});

// index route
Route::get('/company/index', [CompanyController::class, 'index'])->name('company.index');

// create & store routes for company
Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
Route::post('/company/store', [CompanyController::class, 'store'])->name('company.store');

// edit & update routes for company
Route::get('/company/edit/{id}', [CompanyController::class, 'edit'])->name('company.edit');
Route::put('/company/update/{id}', [CompanyController::class, 'update'])->name('company.update');

// show route for company
Route::get('/company/show/{id}', [CompanyController::class, 'show'])->name('company.show');

// destroy route for company
Route::delete('/company/delete/{id}', [CompanyController::class, 'destroy'])->name('company.delete');




// search route for company
Route::post('/company/search', [SearchController::class, 'search'])->name('company.search');




// admin login route
Route::get('/admin/login-form', [LoginController::class, 'createLoginForm'])->name('login.form'); // login form 
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login'); // admin is logged in 
Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout'); // log out 





// index page for employees
Route::get('/employee/index', [EmployeeController::class, 'index'])->name('employee.index');

// create & store routes for employee
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');

// edit & update routes for employees
Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');

// destroy route for employees
Route::delete('/employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');











