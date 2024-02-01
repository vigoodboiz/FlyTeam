<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OderController;
use App\Http\Controllers\Admin\oder_status_statusController;
use App\Http\Controllers\Admin\oder_detailController;
use App\Http\Controllers\Admin\delivery_statusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AccountController;
use Illuminate\Support\Facades\Gate;
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

Route::prefix('admin')->middleware(['auth'])->group(function () {

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

    ///////// oder ///////////
    Route::get('/oder', [OderController::class, 'listOder'])->name('listOder');
    Route::match(['GET', 'POST'], '/addoder', [OderController::class, 'addOder'])->name('addOder');
    Route::match(['GET', 'POST'], '/editoder/{id}', [OderController::class, 'editoder'])->name('editoder');
    Route::get('/delete/{id}', [OderController::class, 'deleteoder'])->name('deleteoder');

    ///////// oder_status ///////////
    Route::get('/oder/list_oder_status', [oder_status_statusController::class, 'list'])->name('listOder_status');
    Route::match(['GET', 'POST'], '/oder/add_oder_status', [oder_status_statusController::class, 'add'])->name('addOder_status');
    Route::match(['GET', 'POST'], '/oder/edit_oder_status/{id}', [oder_status_statusController::class, 'edit'])->name('editOder_status');
    Route::get('/oder/delete_oder_status/{id}', [oder_status_statusController::class, 'delete'])->name('deleteOder_status');

    ///////// oder_detail ///////////
    Route::get('/oder/list_oder_detail', [oder_detailController::class, 'list'])->name('listOder_detail');
    Route::match(['GET', 'POST'], '/oder/add_oder_detail', [oder_detailController::class, 'add'])->name('addOder_detail');
    Route::match(['GET', 'POST'], '/oder/edit_oder_detail/{id}', [oder_detailController::class, 'edit'])->name('editOder_detail');
    Route::get('/oder/delete_oder_detail/{id}', [oder_detailController::class, 'delete'])->name('deleteOder_detail');

    ///////// delivery_status ///////////
    Route::get('/oder/list_delivery_status', [delivery_statusController::class, 'list'])->name('listDelivery_status');
    Route::match(['GET', 'POST'], '/oder/add_delivery_status', [delivery_statusController::class, 'add'])->name('addDelivery_status');
    Route::match(['GET', 'POST'], '/oder/edit_delivery_status/{id}', [delivery_statusController::class, 'edit'])->name('editDelivery_status');
    Route::get('/oder/delete_delivery_status/{id}', [delivery_statusController::class, 'delete'])->name('deleteDelivery_status');
});
Route::prefix('account')
    ->as('account')
    ->group(function () {

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
Route::get('/auth/facebook', function () {
    return Socialite::driver('facebook')->redirect();
});

Route::get('/auth/facebook/callback', function () {
    return 'Callback login facebook';
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

