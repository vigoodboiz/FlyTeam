<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CommentController;

use App\Http\Controllers\FacebookController;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions');
Route::get('/roles', [RoleController::class, 'index'])->name('roles');

 //Comments
 Route::get('/getComments',[CommentController::class,'index'])->name('route_comment_index');
 Route::match(['GET','POST'],'/comment/add',[CommentController::class,'add'])->name('route_comment_add');
 Route::match(['GET','POST'],'/comment/update/{id}',[CommentController::class,'update'])->name('route_comment_update');
 Route::match(['GET','POST'],'/comment/delete/{id}',[CommentController::class,'delete'])->name('route_comment_delete');


Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
  //facebook
Route::controller(FacebookController::class)->group(function(){
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});