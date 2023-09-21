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
// search route for company
Route::post('/company/search', [SearchController::class, 'search'])->name('company.search');


Route::controller(CompanyController::class)->group(function () { 

// index route
Route::get('/company/index','index')->name('company.index');

// create & store routes for company
Route::get('/company/create', 'create')->name('company.create');
Route::post('/company/store', 'store')->name('company.store');

// edit & update routes for company
Route::get('/company/edit/{id}', 'edit')->name('company.edit');
Route::put('/company/update/{id}', 'update')->name('company.update');

// show route for company
Route::get('/company/show/{id}', 'show')->name('company.show');

// destroy route for company
Route::delete('/company/delete/{id}', 'destroy')->name('company.delete');

});


Route::controller(LoginController::class)->group(function () { 
// admin login route
Route::get('/admin/login-form','createLoginForm')->name('login.form'); // login form 
Route::post('/admin/login', 'adminLogin')->name('admin.login'); // admin is logged in 
Route::get('/admin/logout','logout')->name('admin.logout'); // log out 
});


Route::controller(EmployeeController::class)->group(function () {
    // index page for employees
Route::get('/employee/index', 'index')->name('employee.index');
// create & store routes for employee
Route::get('/employee/create','create')->name('employee.create');
Route::post('/employee/store', 'store')->name('employee.store');

// edit & update routes for employees
Route::get('/employee/edit/{id}','edit')->name('employee.edit');
Route::put('/employee/update/{id}', 'update')->name('employee.update');

// destroy route for employees
Route::delete('/employee/delete/{id}', 'destroy')->name('employee.delete');
});








