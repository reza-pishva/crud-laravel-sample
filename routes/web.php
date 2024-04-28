<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;


Route::get('/',[CustomerController::class,'index'])->name('customer.index');
Route::get('/customers/create',[CustomerController::class,'create'])->name('customer.create');
Route::get('/customers/{customer}',[CustomerController::class,'show'])->name('customer.show');
Route::post('/customers',[CustomerController::class,'store'])->name('customer.store');
Route::get('/customers/{customer}/edit',[CustomerController::class,'edit'])->name('customer.edit');
Route::put('/customers/{customer}',[CustomerController::class,'update'])->name('customer.update');
Route::delete('/customers/{customer}',[CustomerController::class,'delete'])->name('customer.delete');
Route::get('/update_error',[CustomerController::class,'update_error'])->name('customer.update_error');
Route::get('/store_error',[CustomerController::class,'store_error'])->name('customer.store_error');

