<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OderController;
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

Route::get('/oder', [OderController::class , 'listOder'] )->name('listOder');
Route::match(['GET','POST'],'/addoder', [OderController::class, 'addOder'])->name('addOder');
Route::match(['GET','POST'],'/editoder/{id}', [OderController::class, 'editoder'])->name('editoder');
Route::get('/delete/{id}',[OderController::class, 'deleteoder'])->name('deleteoder');
