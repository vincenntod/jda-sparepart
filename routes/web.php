<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MotorController;

use App\Http\Controllers\SparepartController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ViewController;

Route::middleware(['isLogin'])->group(function(){
    Route::get('/login', [LoginController::class, 'index']);
    Route::get('/register', [LoginController::class, 'viewRegister']);
    Route::post('/register', [LoginController::class, 'register']);
    Route::post('/login', [LoginController::class, 'auth']);
});

Route::middleware(['isAdmin'])->group(function(){
    Route::post('/logout', [LoginController::class, 'logout']);
    
    Route::get('/',[DashboardController::class, 'index']);
    Route::get('/dataChartListMotor',[DashboardController::class, 'dataChartListMotor']);
    
    Route::get('/motor-menu', function(){ return view("motor.motor-menu");});
    Route::get('/sparepart-menu', function(){ return view("sparepart.sparepart-menu");});
    Route::get('/supplier-menu', function(){ return view("supplier.supplier-menu");});
    Route::get('/brand-menu', function(){return view("brand.brand-menu");});
    Route::get('/category-menu', function(){return view("category.category-menu");});
    
    Route::resource('motor', MotorController::class);
    Route::resource('sparepart', SparepartController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('category', CategoryController::class);
});

Route::get('/unautorized', function(){ return view("unautorized");});
Route::get('/notfound', function(){ return view("notfound");});

