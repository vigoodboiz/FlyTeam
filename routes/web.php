<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/users', function(){
    abort_if(Gate::denies('user_access', 403, 'Ban khong co quyen truy cap vao trang nay!'));
    return view('users');
})->middleware(['auth', 'verified'])->name('users');

Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'edit'])->name('user.edit');
});
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function(){

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //Permissions
    Route::delete('permissions/massDestroy', [PermissionController::class, 'massDestroy']);
    Route::resource('permissions', PermissionController::class);

    //Roles
    Route::delete('roles/massDestroy', [RoleController::class, 'massDestroy']);
    Route::resource('roles', RoleController::class);

    //Users
    Route::delete('users/massDestroy', [UserController::class, 'massDestroy']);
    Route::resource('users', UserController::class);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions');
Route::get('/roles', [RoleController::class, 'index'])->name('roles');

 //Comments
 Route::get('/getComments',[CommentController::class,'add'])->name('route_comment_index');
 Route::match(['GET','POST'],'/comment/add',[App\Http\Controllers\CommentController::class,'add'])->name('route_comment_add');
 Route::match(['GET','POST'],'/comment/update/{id}',[App\Http\Controllers\CommentController::class,'update'])->name('route_comment_update');
 Route::match(['GET','POST'],'/comment/delete/{id}',[App\Http\Controllers\CommentController::class,'delete'])->name('route_comment_delete');
