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

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CommentController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
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

    //Comments
    Route::get('/getComments', [CommentController::class, 'index'])->name('route_comment_index');
    Route::match(['GET', 'POST'], '/comment/add', [CommentController::class, 'add'])->name('route_comment_add');
    Route::match(['GET', 'POST'], '/comment/update/{id}', [CommentController::class, 'update'])->name('route_comment_update');
    Route::match(['GET', 'POST'], '/comment/delete/{id}', [CommentController::class, 'delete'])->name('route_comment_delete');
});





//Laravel socialite
Route::get('/auth/facebook', function () {
    return Socialite::driver('facebook')->redirect();
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions');
Route::get('/roles', [RoleController::class, 'index'])->name('roles');




//Comments
Route::get('/getComments', [CommentController::class, 'index'])->name('route_comment_index');
Route::match(['GET', 'POST'], '/comment/add', [CommentController::class, 'add'])->name('route_comment_add');
Route::match(['GET', 'POST'], '/comment/update/{id}', [CommentController::class, 'update'])->name('route_comment_update');
Route::match(['GET', 'POST'], '/comment/delete/{id}', [CommentController::class, 'delete'])->name('route_comment_delete');

//facebook

Route::get('/auth/facebook/callback', function () {
    return 'Callback login facebook';
});
