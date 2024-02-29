<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OderController;
use App\Http\Controllers\Admin\OderStatusController;
use App\Http\Controllers\Admin\OderDetailController;
use App\Http\Controllers\Admin\DeliveryStatusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
// home
use App\Http\Controllers\shopGridController;
use App\Http\Controllers\ShopDetailsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;

use App\Http\Controllers\WishlishController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AcountController;
use App\Http\Controllers\CartController;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\RegisteredUserController;


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
    return view('page.index');
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

    //Forgot password
    // Route::get('/forget-pasword', [ForgotPasswordController::class, 'forgetPass'])->name('forgetPass');
    // Route::post('/forget-pasword', [ForgotPasswordController::class, 'postForgetPass']);
    // Route::get('/get-password/{user}/{token}', [ForgotPasswordController::class, 'getPass'])->name('getPass');
    // Route::post('/get-pasword/{user}/{token}', [ForgotPasswordController::class, 'postGetPass']);

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
    Route::match(['GET', 'POST'], '/oder/search', [OderController::class, 'listOder'])->name('searchOder');
    Route::match(['GET', 'POST'], '/addoder', [OderController::class, 'addOder'])->name('addOder');
    Route::match(['GET', 'POST'], '/editoder/{id}', [OderController::class, 'editoder'])->name('editoder');
    Route::get('/delete/{id}', [OderController::class, 'deleteoder'])->name('deleteoder');

    ///////// oder_status ///////////
    Route::get('/oder/list_oder_status', [OderStatusController::class, 'list'])->name('listOder_status');
    Route::match(['GET', 'POST'], '/oder/add_oder_status', [OderStatusController::class, 'add'])->name('addOder_status');
    Route::match(['GET', 'POST'], '/oder/edit_oder_status/{id}', [OderStatusController::class, 'edit'])->name('editOder_status');
    Route::get('/oder/delete_oder_status/{id}', [OderStatusController::class, 'delete'])->name('deleteOder_status');

    ///////// oder_detail ///////////
    Route::get('/oder/list_oder_detail', [OderDetailController::class, 'list'])->name('listOder_detail');
    Route::match(['GET', 'POST'], '/oder/add_oder_detail', [OderDetailController::class, 'add'])->name('addOder_detail');
    Route::match(['GET', 'POST'], '/oder/edit_oder_detail/{id}', [OderDetailController::class, 'edit'])->name('editOder_detail');
    Route::get('/oder/delete_oder_detail/{id}', [OderDetailController::class, 'delete'])->name('deleteOder_detail');

    ///////// delivery_status ///////////
    Route::get('/oder/list_delivery_status', [DeliveryStatusController::class, 'list'])->name('listDelivery_status');
    Route::match(['GET', 'POST'], '/oder/add_delivery_status', [DeliveryStatusController::class, 'add'])->name('addDelivery_status');
    Route::match(['GET', 'POST'], '/oder/edit_delivery_status/{id}', [DeliveryStatusController::class, 'edit'])->name('editDelivery_status');
    Route::get('/oder/delete_delivery_status/{id}', [DeliveryStatusController::class, 'delete'])->name('deleteDelivery_status');

    //Comments
    Route::get('/getComments', [CommentController::class, 'index'])->name('route_comment_index');
    Route::match(['GET', 'POST'], '/comment/add', [CommentController::class, 'add'])->name('route_comment_add');
    Route::match(['GET', 'POST'], '/comment/update/{id}', [CommentController::class, 'update'])->name('route_comment_update');
    Route::match(['GET', 'POST'], '/comment/delete/{id}', [CommentController::class, 'delete'])->name('route_comment_delete');


    ///////////////////////// product //////////////////
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

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
    Route::post('/check-coupon', [CartController::class, 'check_coupon'])->name('check_coupon');
    Route::get('/unset-coupon', [CouponController::class, 'unset_coupon'])->name('unset_coupon');

});





//Comments
Route::get('/getComments', [CommentController::class, 'index'])->name('route_comment_index');
Route::match(['GET', 'POST'], '/comment/add', [CommentController::class, 'add'])->name('route_comment_add');
Route::match(['GET', 'POST'], '/comment/update/{id}', [CommentController::class, 'update'])->name('route_comment_update');
Route::match(['GET', 'POST'], '/comment/delete/{id}', [CommentController::class, 'delete'])->name('route_comment_delete');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
//Route Facebook
Route::controller(FacebookController::class)->group(function () {
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});
//Route Google
Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});
// Send email
Route::get('/send-mail{email}', [RegisteredUserController::class, 'store'])->name('send.email');


/////////////////////main//////////////////////

// home
Route::get('home', [HomeController::class, 'index'])->name('home');

// shop
Route::get('page/shop', [shopGridController::class, 'index'])->name('shopGrid');
Route::get('page/shop/fillCate/{id_cate}', [shopGridController::class, 'fillCate'])->name('fillCate');
Route::get('page/shop/fillPrice', [shopGridController::class, 'fillPrice'])->name('fillPrice');
// shop details
Route::get('page/shopDetails/{id_pro}', [ShopDetailsController::class, 'index'])->name('shopDetails');
//blog
Route::get('page/blog', [BlogController::class, 'index'])->name('blogPage');
// about
Route::get('page/about', [AboutController::class, 'index'])->name('aboutPage');
// privacy
Route::get('page/privacy', [PrivacyController::class, 'index'])->name('privacyPage');
// contact
Route::get('page/contact', [ContactController::class, 'index'])->name('contactPage');

// Checkout
Route::get('page/Checkout', [CheckoutController::class, 'index'])->name('checkoutPage');
// acount
Route::get('page/acount', [AcountController::class, 'index'])->name('acountPage');
// wishlist
Route::get('page/wishlist', [WishlishController::class, 'index'])->name('wishlistPage');
// cart
Route::get('page/cart', [CartController::class, 'index'])->name('cartPage');
Route::post('add_to_cart/{product}', [CartController::class, 'store'])->name('addCart');
Route::delete('/cart/products/{productId}', [CartController::class, 'removeProductFromCart'])->name('cart.removeProduct');
