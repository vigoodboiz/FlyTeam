<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OderController;
use App\Http\Controllers\oder_status_statusController;
use App\Http\Controllers\oder_detailController;
use App\Http\Controllers\delivery_statusController;

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

Route::get('/', function () {
    return view('welcome');
});

///////// oder ///////////
Route::get('/oder', [OderController::class , 'listOder'] )->name('listOder');
Route::match(['GET','POST'],'/addoder', [OderController::class, 'addOder'])->name('addOder');
Route::match(['GET','POST'],'/editoder/{id}', [OderController::class, 'editoder'])->name('editoder');
Route::get('/delete/{id}',[OderController::class, 'deleteoder'])->name('deleteoder');

///////// oder_status ///////////
Route::get('/oder/list_oder_status', [oder_status_statusController::class , 'list'] )->name('listOder_status');
Route::match(['GET','POST'],'/oder/add_oder_status', [oder_status_statusController::class, 'add'])->name('addOder_status');
Route::match(['GET','POST'],'/oder/edit_oder_status/{id}', [oder_status_statusController::class, 'edit'])->name('editOder_status');
Route::get('/oder/delete_oder_status/{id}',[oder_status_statusController::class, 'delete'])->name('deleteOder_status');

///////// oder_detail ///////////
Route::get('/oder/list_oder_detail', [oder_detailController::class , 'list'] )->name('listOder_detail');
Route::match(['GET','POST'],'/oder/add_oder_detail', [oder_detailController::class, 'add'])->name('addOder_detail');
Route::match(['GET','POST'],'/oder/edit_oder_detail/{id}', [oder_detailController::class, 'edit'])->name('editOder_detail');
Route::get('/oder/delete_oder_detail/{id}',[oder_detailController::class, 'delete'])->name('deleteOder_detail');

///////// delivery_status ///////////
Route::get('/oder/list_delivery_status', [delivery_statusController::class , 'list'] )->name('listDelivery_status');
Route::match(['GET','POST'],'/oder/add_delivery_status', [delivery_statusController::class, 'add'])->name('addDelivery_status');
Route::match(['GET','POST'],'/oder/edit_delivery_status/{id}', [delivery_statusController::class, 'edit'])->name('editDelivery_status');
Route::get('/oder/delete_delivery_status/{id}',[delivery_statusController::class, 'delete'])->name('deleteDelivery_status');