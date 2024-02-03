<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OderController;
use App\Http\Controllers\Admin\oder_status_statusController;
use App\Http\Controllers\Admin\oder_detailController;
use App\Http\Controllers\Admin\delivery_statusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
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
    /////////member////////////////
    Route::post('/members/create', [MemberController::class, 'create'])->name('members.create');
    Route::post('/members', [MemberController::class, 'store'])->name('members.store');

    Route::get('/members', [MemberController::class, 'index'])->name('members.index');

    Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::put('/members/{member}', [MemberController::class, 'update'])->name('members.update');
    Route::resource('members', MemberController::class);

    Route::get('/ranking', [MemberController::class, 'ranking'])->name('members.ranking');

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


     ///////////////////////// product //////////////////
     Route::get('/products', [ProductController::class, 'index'])->name('products.index');
     // Route::get('/products/create', [ProductController::class, 'create']);
     Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
     Route::post('/products', [ProductController::class, 'store'])->name('products.store');

     Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
     Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');


     Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');


     ///////////////////////// cate //////////////////
     Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
     

     Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
     Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

     Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
     Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

     Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    //Coupon//
    Route::get('/insert-coupon', [CouponController::class, 'insert_coupon'])->name('insert_coupon');
    Route::get('/delete-coupon/{coupon_id}', [CouponController::class, 'delete_coupon'])->name("delete_coupon");
    Route::get('/list-coupon', [CouponController::class, 'list_coupon'])->name('list_coupon');
    Route::post('/insert-coupon-code', [CouponController::class, 'insert_coupon_code'])->name('insert_coupon_code');
});

//Comments
Route::get('/getComments', [CommentController::class, 'index'])->name('route_comment_index');
Route::match(['GET', 'POST'], '/comment/add', [CommentController::class, 'add'])->name('route_comment_add');
Route::match(['GET', 'POST'], '/comment/update/{id}', [CommentController::class, 'update'])->name('route_comment_update');
Route::match(['GET', 'POST'], '/comment/delete/{id}', [CommentController::class, 'delete'])->name('route_comment_delete');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
  //facebook
// Route::controller(FacebookController::class)->group(function(){
//     Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
//     Route::get('auth/facebook/callback', 'handleFacebookCallback');
// });
Route::get('auth/facebook', [FacebookController::class, 'redirectToFB']);
Route::get('callback/facebook', [FacebookController::class, 'handleCallback']);