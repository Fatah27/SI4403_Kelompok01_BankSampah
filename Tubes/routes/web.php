<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/detail' , [\App\Http\Controllers\HomeController::class , 'detail'])->name('detail');
Route::post('/detail' , [\App\Http\Controllers\HomeController::class , 'update'])->name('update');

Route::get('/' , [\App\Http\Controllers\IndexController::class , 'index'])->name('index');

Route::get('/Warehouse/index' , [\App\Http\Controllers\WarehouseController::class , 'index'])->name('warehouse.index');
Route::get('/Warehouse/add' , [\App\Http\Controllers\WarehouseController::class , 'add'])->name('warehouse.add');
Route::post('/Warehouse/add' , [\App\Http\Controllers\WarehouseController::class , 'tambah'])->name('warehouse.add');
Route::get('/Warehouse/sell/{id}' , [\App\Http\Controllers\WarehouseController::class , 'sell'])->name('warehouse.sell');
Route::get('/Warehouse/hide/{id}' , [\App\Http\Controllers\WarehouseController::class , 'hide'])->name('warehouse.hide');
Route::get('/Warehouse/edit/{id}' , [\App\Http\Controllers\WarehouseController::class , 'edit'])->name('warehouse.edit');
Route::post('/Warehouse/edit/{id}' , [\App\Http\Controllers\WarehouseController::class , 'put'])->name('warehouse.edit');
Route::get('/Warehouse/delete/{id}' , [\App\Http\Controllers\WarehouseController::class , 'delete'])->name('warehouse.delete');


Route::get('/Shop/index' , [\App\Http\Controllers\ShopController::class , 'index'])->name('shop.index');
Route::get('/Shop/detail/{id}' , [\App\Http\Controllers\ShopController::class , 'detail'])->name('shop.detail');
Route::get('/Shop/search' , [\App\Http\Controllers\ShopController::class , 'search'])->name('shop.search');

Route::post('/Keranjang/post/{id}' , [\App\Http\Controllers\KeranjangController::class , 'post'])->name('keranjang.post');
Route::get('/Keranjang/detail' , [\App\Http\Controllers\KeranjangController::class , 'detail'])->name('keranjang.detail');
Route::get('/Keranjang/edit/{id}' , [\App\Http\Controllers\KeranjangController::class , 'editdetail'])->name('keranjang.editdetail');
Route::post('/Keranjang/edit/{id}' , [\App\Http\Controllers\KeranjangController::class , 'edit'])->name('keranjang.editdetail');
Route::get('/keranjang/delete/{id}' , [\App\Http\Controllers\KeranjangController::class , 'delete'])->name('keranjang.delete');

Route::post('/order/make/{total}' , [\App\Http\Controllers\OrderController::class , 'post'])->name('order.make');
Route::get('/order/index' , [\App\Http\Controllers\OrderController::class , 'index'])->name('order.index');
Route::get('/order/loh/{id}' , [\App\Http\Controllers\OrderController::class , 'kirim'])->name('order.kirim');
Route::post('/order/terima/{id}/{sampah}' , [\App\Http\Controllers\OrderController::class , 'terima'])->name('order.terima');

