<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactioController;
use App\Http\Controllers\Admin\CategoryControlleradmin;
use App\Http\Controllers\Admin\ProductGalleryController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'detail'])->name('categories-detail');

Route::get('/details/{id}', [App\Http\Controllers\DetailController::class, 'index'])->name('detail');
Route::post('/details/{id}', [App\Http\Controllers\DetailController::class, 'add'])->name('detail-add');
Route::get('/register/success', [App\Http\Controllers\Auth\RegisterController::class, 'success'])->name('register-success');

Route::get('/success', [App\Http\Controllers\CartController::class,'success'])->name('success');
Route::post('/checkout/callback', [App\Http\Controllers\CheckoutController::class, 'callback'])->name('midtrans-callback');

Route::group(['middleware' => ['auth']], function () {

        Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
        // Route::delete('/cart/{id}',  [App\Http\Controllers\CartController::class, 'delete'])->name('cart-delete');
        Route::resource('keranjang', CartController::class);

        Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout');
        Route::resource('dashboard', UserController::class);

        Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('dashboard');
        Route::get('/storesettings/{id}', [App\Http\Controllers\UserController::class, 'editstore'])->name('storesettings');
        Route::post('/storeupdate/{id}', [App\Http\Controllers\UserController::class, 'updatestore'])->name('storeupdate');

        Route::get('/dashboard-transactions', [App\Http\Controllers\TransactionController::class, 'index'])
                ->name('dashboard-transactions');
        Route::get('/dashboard-transactions', [App\Http\Controllers\TransactionController::class, 'details'])
                ->name('dashboard-transaction-details');

        Route::get('/dashboard/seller', [App\Http\Controllers\DashboardSellerController::class, 'index'])
                ->name('seller-dashboard');
        Route::get('/dashboard-products', [\App\Http\Controllers\DashboardProductController::class, 'index'])
                ->name('seller-product');
        Route::get('/dashboard/products/create', [\App\Http\Controllers\DashboardProductController::class, 'create'])
                ->name('seller-productAdd');

                
        Route::post('/dashboard/products', [\App\Http\Controllers\DashboardProductController::class, 'store'])
                ->name('seller-insertProduct');
        Route::get('/dashboard/products/{id}',  [\App\Http\Controllers\DashboardProductController::class, 'details'])
                ->name('seller-productDetails');
        Route::post('/dashboard/products/{id}',  [\App\Http\Controllers\DashboardProductController::class, 'update'])
                ->name('seller-productUpdate');
        Route::get('dashboard/delete/{id}', [\App\Http\Controllers\DashboardProductController::class, 'destroy'])
                ->name('seller-productDelete');



        Route::post('/dashboard/products/gallery/upload',  [\App\Http\Controllers\DashboardProductController::class, 'uploadGallery'])
                ->name('seller-galleryUpload');
        Route::get('/dashboard/products/gallery/delete/{id}', [\App\Http\Controllers\DashboardProductController::class, 'deleteGallery'])
                ->name('seller-galleryDelete');
        Route::post('/dashboard/update/{redirect}', [\App\Http\Controllers\DashboardAccountController::class, 'update'])
                ->name('seller-settings-redirect');
});



Route::prefix('admin')
        ->group(function () {
                Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard-admin');
                Route::resource('category', CategoryControlleradmin::class);
                Route::resource('users', UsersController::class);
                Route::resource('product', ProductController::class);
                Route::resource('gallery', ProductGalleryController::class);
                Route::resource('transaction', TransactioController::class);
        });



Route::get('template', function () {
        return view('pages/seller/template');
});

// Route::get('dashboard', function () {
//         return view('pages/seller/dashboard');
// });

Route::get('product', function () {
        return view('pages/seller/product');
});
Route::get('account', function () {
        return view('pages/seller/account');
});
