<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CommentController;


//use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AccountController;

// use App\Http\Controllers\Admin\AccountController; 


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

    //Comments
    Route::get('/getComments',[CommentController::class,'index'])->name('route_comment_index');
    Route::match(['GET','POST'],'/comment/add',[CommentController::class,'add'])->name('route_comment_add');
    Route::match(['GET','POST'],'/comment/update/{id}',[CommentController::class,'update'])->name('route_comment_update');
    Route::match(['GET','POST'],'/comment/delete/{id}',[CommentController::class,'delete'])->name('route_comment_delete');

    ///////////////////////// product //////////////////
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        // Route::get('/products/create', [ProductController::class, 'create']);
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');

        Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');


        Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');


        ///////////////////////// cate //////////////////

        Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');

        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

//Laravel socialite
Route::get('/auth/facebook', function(){
    return Socialite::driver('facebook')->redirect();
});


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions');
Route::get('/roles', [RoleController::class, 'index'])->name('roles');




 //Comments
//  Route::get('/getComments',[CommentController::class,'index'])->name('route_comment_index');
//  Route::match(['GET','POST'],'/comment/add',[CommentController::class,'add'])->name('route_comment_add');
//  Route::match(['GET','POST'],'/comment/update/{id}',[CommentController::class,'update'])->name('route_comment_update');
//  Route::match(['GET','POST'],'/comment/delete/{id}',[CommentController::class,'delete'])->name('route_comment_delete');

//facebook

Route::get('/auth/facebook/callback', function(){
    return 'Callback login facebook';
});

