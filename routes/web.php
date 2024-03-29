<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OderController;
use App\Http\Controllers\Admin\OderStatusController;
use App\Http\Controllers\Admin\OderDetailController;
use App\Http\Controllers\Admin\DeliveryStatusController;
use App\Http\Controllers\Admin\VariantController;
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
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\StatisticController;


// home
use App\Http\Controllers\shopGridController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ShopDetailsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PaymentController;

use App\Http\Controllers\WishlishController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AcountController;
use App\Http\Controllers\ErrosController;

use App\Http\Controllers\PointController;

use App\Http\Controllers\HistoryController;


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

// Route::get('/', function () {
//     return view('page.index');
// });
// home
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
Route::get('page/point', [PointController::class, 'index'])->name('point');

Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');



require __DIR__ . '/auth.php';
Route::prefix('admin')->middleware(['auth'])->group(function () {


    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/get_earnings_data',[DashboardController::class,'getEarningsData'])->name('get_earnings_data');

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
    Route::post('/members', [MemberController::class, 'show'])->name('members.show');
    Route::get('/members', [MemberController::class, 'index'])->name('members.index');

    Route::resource('members', MemberController::class);


//    Route::get('/statistics/view_count', [StatisticController::class, 'index'])->name('statistics.view_countproduct');
    ///////// oder ///////////
    Route::get('/oder', [OderController::class, 'listOder'])->name('listOder');
    Route::match(['GET', 'POST'], '/oder/search', [OderController::class, 'listOder'])->name('searchOder');
    Route::get('/delete/{id}', [OderController::class, 'deleteoder'])->name('deleteoder');
    Route::get('/detail/{order}', [OderController::class, 'showOrder'])->name('showOrder');

    //Forgot password
    Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPass'])->name('password.forgot');
    Route::post('verify-otp', [ForgotPasswordController::class, 'verify'])->name('otp.verify');

    ///////// oder_status ///////////
    Route::get('/oder/list_oder_status', [OderStatusController::class, 'list'])->name('listOder_status');
    Route::get('/oder/delete_oder_status/{id}', [OderStatusController::class, 'delete'])->name('deleteOder_status');
    Route::post('/oder/updateOder_status', [OderStatusController::class, 'updateStatus'])->name('updateOder_status');
    Route::post('/oder/updateDelivery_status', [OderStatusController::class, 'updateDelivery_status'])->name('updateDelivery_status');


    ///////// oder_detail ///////////
    Route::get('/oder/list_oder_detail/{id}', [OderDetailController::class, 'list'])->name('listOder_detail');
    Route::get('/oder/delete_oder_detail/{id}', [OderDetailController::class, 'delete'])->name('deleteOder_detail');

    ///////// delivery_status ///////////
    Route::get('/oder/list_delivery_status', [DeliveryStatusController::class, 'list'])->name('listDelivery_status');
    Route::get('/oder/delete_delivery_status/{id}', [DeliveryStatusController::class, 'delete'])->name('deleteDelivery_status');

    //Comments
    Route::get('/getComments', [CommentController::class, 'index'])->name('route_comment_index');
    Route::match(['GET', 'POST'], '/comment/add', [CommentController::class, 'add'])->name('route_comment_add');
    Route::match(['GET', 'POST'], '/comment/update/{id}', [CommentController::class, 'update'])->name('route_comment_update');
    Route::match(['GET', 'POST'], '/comment/delete/{id}', [CommentController::class, 'delete'])->name('route_comment_delete');
    Route::post('/newComment', [ShopDetailsController::class, 'newComment'])->name('route_new_comment');
    Route::match(['GET', 'POST'], '/comment/delete/{id}', [ShopDetailsController::class, 'delete'])->name('route_comment_delete_fe');

    Route::get('/comments/{id}/edit', [ShopDetailsController::class, 'edit'])->name('comments.edit');
    Route::patch('/comments/{id}', [ShopDetailsController::class, 'update'])->name('comments.update');



    ///////////////////////// product //////////////////
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    // Route::post('/upload', [ProductController::class, 'upload'])->name('upload');

   //variant
   Route::get('/variants/{product_id}', [VariantController::class, 'index'])->name('variants.index');
   Route::get('/variants/create/{product_id}', [VariantController::class, 'create'])->name('variants.create');
   Route::post('/variants/store/{product_id}', [VariantController::class, 'store'])->name('variants.store');
   Route::get('/variants/edit/{product_id}', [VariantController::class, 'edit'])->name('variants.edit');
   Route::put('/variants/update/{product_id}', [VariantController::class, 'update'])->name('variants.update');
   Route::delete('/variants/{id}', [VariantController::class, 'destroy'])->name('variants.destroy');




    ///////////////////////// gallery //////////////////
    Route::get('/index/{product_id}', [GalleryController::class, 'index'])->name('index');
    Route::get('/gallery/create/{product_id}', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery/store/{product_id}', [GalleryController::class, 'store'])->name('gallery.store');
    Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    ///////////////////////// cate //////////////////
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    //Coupon//
    Route::get('/insert-coupon', [CouponController::class, 'insert_coupon'])->name('insert_coupon');
    Route::delete('/delete-coupon/{coupon_id}', [CouponController::class, 'delete_coupon'])->name("delete_coupon");
    Route::get('/list-coupon', [CouponController::class, 'list_coupon'])->name('list_coupon');
    Route::post('/insert-coupon-code', [CouponController::class, 'insert_coupon_code'])->name('insert_coupon_code');
    Route::post('/check-coupon', [CartController::class, 'check_coupon'])->name('check_coupon');
    Route::match(['GET', 'POST'],'/unset-coupon', [CouponController::class, 'unset_coupon'])->name('unset_coupon');



    ////////////////////////// thanh toán Vnpay /////////////////
    Route::match(['GET', 'POST'], '/vnpay_payment', [PaymentController::class, 'vnpay_payment'])->name('vnpay_payment');
    Route::match(['GET', 'POST'], '/vnpay-checkout', [CheckoutController::class, 'vnpayCheckout'])->name('vnpayCheckout');
    ////////////////////////// thanh toán momo /////////////////
    Route::match(['GET', 'POST'], '/momo_payment', [PaymentController::class, 'momo_payment'])->name('momo_payment');
    Route::match(['GET', 'POST'], '/momoCheckout', [CheckoutController::class, 'momoCheckout'])->name('momoCheckout');
    ////////////////////////// thanh toán paypal /////////////////
    Route::get('/paypal/execute-payment', 'CheckoutController@executePayment')->name('paypalExecutePayment');
    Route::get('/paypal/cancel-payment', 'CheckoutController@cancelPayment')->name('paypalCancelPayment');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// Send email
Route::get('/send-mail{email}', [RegisteredUserController::class, 'store'])->name('send.email');




// shop
Route::get('page/shop', [shopGridController::class, 'index'])->name('shopGrid');
Route::get('page/shop/fillCate/{id_cate}', [shopGridController::class, 'fillCate'])->name('fillCate');
Route::get('page/shop/fillPrice', [shopGridController::class, 'fillPrice'])->name('fillPrice');
Route::get('page/shop/fillBrand', [shopGridController::class, 'fillBrand'])->name('fillBrand');
Route::get('/products/shop/{brand}', [shopGridController::class, 'fillBrand'])->name('fillBrand');
Route::match(['GET', 'POST'], '/shopGrid/searchPro', [shopGridController::class, 'index'])->name('search');


// lỗi 404
Route::get('page/errors', [ErrosController::class, 'index'])->name('errors');
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
Route::middleware('auth')->group(function () {
Route::get('page/Checkout', [CheckoutController::class, 'index'])->name('checkoutPage');
Route::match(['GET', 'POST'],'page/Checkouto', [CheckoutController::class, 'post_checkout'])->name('checkoutPost');
Route::get('verify/{token}', [CheckoutController::class, 'verify'])->name('oder.verify');
});

// acount


Route::get('page/portfolioPage', [AcountController::class, 'index'])->name('portfolioPage');
///////////////////////

// Route::get('/page/point/{id}', 'PointController@index');
//
Route::get('page/acount', [AcountController::class, 'index'])->name('acountPage');

Route::get('page/account', [AccountController::class, 'index'])->name('accountPage');
Route::get('page/portfolio', [PortfolioController::class, 'index'])->name('portfolioPage');

// wishlist
Route::get('page/wishlist', [WishlishController::class, 'index'])->name('wishlistPage');

// cartf
Route::get('page/cart', [CartController::class, 'index'])->name('cartPage');
Route::post('add_to_cart/{product}', [CartController::class, 'store'])->name('addCart');
Route::match(['GET', 'POST'],'/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/products/{productId}', [CartController::class, 'removeProductFromCart'])->name('cart.removeProduct');
Route::get('cart/delete/{cart}', [CartController::class, 'destroy'])->name('cart.delete');


//whishlist
Route::get('/favorite/{product}', [FavoriteController::class, 'index'])->name('favorite');
// Route::delete('/favorite/{id}', [FavoriteController::class, 'destroy'])->name('favorite.delete');

//History order
Route::get('page/history', [HistoryController::class, 'index'])->name('history');
Route::post('orders/{order}/cancel', [CheckoutController::class, 'cancel'])->name('orders.cancel');
Route::get('orders/{id}/reorder', [CheckoutController::class, 'showReorderForm'])->name('orders.reorder');
Route::post('orders/{id}/reorder', [CheckoutController::class, 'reorder'])->name('orders.process_reorder');
Route::get('page/confirmed', [HistoryController::class, 'confirmed'])->name('confirmed');
Route::get('page/delivery', [HistoryController::class, 'delivery'])->name('delivery');
Route::get('page/canceled', [HistoryController::class, 'canceled'])->name('canceled');
Route::get('page/success', [HistoryController::class, 'success'])->name('success');
//Push Notification
Route::get('/pusher', function() {
    $message = $request->message;
    event(new FlyTeamPusher($message));
});
//Paypal
Route::controller(PaymentController::class)
    ->prefix('paypal')
    ->group(function () {
        Route::view('payment', 'paypal.index')->name('create.payment');
        Route::get('handle-payment', 'handlePayment')->name('make.payment');
        Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
        Route::get('payment-success', 'paymentSuccess')->name('success.payment');
    });