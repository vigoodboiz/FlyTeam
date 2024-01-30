<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CommentController;

use App\Http\Controllers\Admin\RoleController; 
use App\Http\Controllers\Admin\AccountController; 

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
// Route::get('/users', function(){
//     abort_if(Gate::denies('user_access', 403, 'Ban khong co quyen truy cap vao trang nay!'));
//     return view('users');
// })->middleware(['auth', 'verified'])->name('users');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/users', [UserController::class, 'edit'])->name('user.edit');
// });
Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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
Route::prefix('account')
->as('account')
->group(function(){
    
//Login
Route::get('/login', [AccountController::class, 'login'])->name('account.login');
Route::get('/verify-account/{$email}', [AccountController::class, 'verify'])->name('account.verify');
Route::post('/login', [AccountController::class, 'check_login']);

//Register
Route::get('/register', [AccountController::class, 'register'])->name('account.register');
Route::post('/register', [AccountController::class, 'check_register']);

//Profile
Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
Route::post('/profile', [AccountController::class, 'check_profile']);

//Change password
Route::get('/change-password', [AccountController::class, 'change_password'])->name('account.change_password');
Route::post('/change-password', [AccountController::class, 'check_change_password']);

//Forgot password
Route::get('/forgot-password', [AccountController::class, 'forgot_password'])->name('account.forgot_password');
Route::post('/forgot-password', [AccountController::class, 'check_forgot_password']);

//Reset password
Route::get('/reset-password', [AccountController::class, 'reset_password'])->name('account.reset_password');
Route::post('/reset-password', [AccountController::class, 'check_reset_password']);

});
//Laravel socialite
Route::get('/auth/facebook', function(){
    return Socialite::driver('facebook')->redirect();
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
=======
Route::get('/auth/facebook/callback', function(){
    return 'Callback login facebook';
});

