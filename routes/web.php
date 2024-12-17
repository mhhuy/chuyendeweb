<?php

use Illuminate\Support\Facades\Route;

//Controller trang quản trị
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\BannerController as ADBannerController;
use App\Http\Controllers\backend\BrandController as ADBrandController;
use App\Http\Controllers\backend\CategoryController as ADCategoryController;
use App\Http\Controllers\backend\ContactController as ADContactController;
use App\Http\Controllers\backend\MenuController as ADMenuController;
use App\Http\Controllers\backend\ProductController as ADProductController;
use App\Http\Controllers\backend\OrderController as ADOrderController;
use App\Http\Controllers\backend\PostController as ADPostController;
use App\Http\Controllers\backend\TopicController as ADTopicController;
use App\Http\Controllers\backend\UserController as ADUserController;

//Controller trang người dùng
use App\Http\Controllers\frontend\HomeController as TrangchuController;
use App\Http\Controllers\frontend\ProductController as CLSanphamController;
use App\Http\Controllers\frontend\ContactController as CLContactController;
use App\Http\Controllers\frontend\PostController as CLPostController; 
use App\Http\Controllers\frontend\UserController as CLUserController;



//-------------------Router Trang người dùng
Route::get('/', [TrangchuController::class, 'index']);
//Liên hệ:
Route::get('/lien-he', [CLContactController::class, 'index']);

//Bài viết:
Route::get('/bai-viet/{slug}', [CLPostController::class, 'post_detail']);

//Sản phẩm
Route::get('/san-pham', [CLSanphamController::class, 'index']);
Route::get('/san-pham/{slug}', [CLSanphamController::class, 'product_detail']);


//-------------------Router Trang quản trị
Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    // Banner Routes
    Route::prefix('banner')->group(function () {
        Route::get('/', [ADBannerController::class, 'index'])->name('backend.banner.index');
        Route::get('trash', [ADBannerController::class, 'trash'])->name('backend.banner.trash');
        Route::get('create', [ADBannerController::class, 'create'])->name('backend.banner.create');
        Route::post('store', [ADBannerController::class, 'store'])->name('backend.banner.store');
        Route::get('{id}/edit', [ADBannerController::class, 'edit'])->name('backend.banner.edit');
        Route::put('{id}/update', [ADBannerController::class, 'update'])->name('backend.banner.update');
        Route::get('show/{id}', [ADBannerController::class, 'show'])->name('backend.banner.show');
        Route::get('{id}/status', [ADBannerController::class, 'status'])->name('backend.banner.status');
        Route::get('{id}/delete', [ADBannerController::class, 'delete'])->name('backend.banner.delete');
        Route::get('{id}/restore', [ADBannerController::class, 'restore'])->name('backend.banner.restore');
        Route::delete('/{id}', [ADBannerController::class, 'destroy'])->name('backend.banner.destroy');
    });
    //Brand
    Route::prefix('brand')->group(function () {
        Route::get('/', [ADBrandController::class, 'index'])->name('backend.brand.index');
        Route::get('trash', [ADBrandController::class, 'trash'])->name('backend.brand.trash');
        Route::get('create', [ADBrandController::class, 'create'])->name('backend.brand.create');
        Route::post('store', [ADBrandController::class, 'store'])->name('backend.brand.store');
        Route::get('{id}/edit', [ADBrandController::class, 'edit'])->name('backend.brand.edit');
        Route::put('{id}/update', [ADBrandController::class, 'update'])->name('backend.brand.update');
        Route::get('show/{id}', [ADBrandController::class, 'show'])->name('backend.brand.show');
        Route::get('{id}/status', [ADBrandController::class, 'status'])->name('backend.brand.status');
        Route::get('{id}/delete', [ADBrandController::class, 'delete'])->name('backend.brand.delete');
        Route::get('{id}/restore', [ADBrandController::class, 'restore'])->name('backend.brand.restore');
        Route::delete('/{id}', [ADBrandController::class, 'destroy'])->name('backend.brand.destroy');
    });
    //category
    Route::prefix('category')->group(function () {
        Route::get('/', [ADCategoryController::class, 'index'])->name('backend.category.index');
        Route::get('trash', [ADCategoryController::class, 'trash'])->name('backend.category.trash');
        Route::get('create', [ADCategoryController::class, 'create'])->name('backend.category.create');
        Route::post('store', [ADCategoryController::class, 'store'])->name('backend.category.store');
        Route::get('{id}/edit', [ADCategoryController::class, 'edit'])->name('backend.category.edit');
        Route::put('{id}/update', [ADCategoryController::class, 'update'])->name('backend.category.update');
        Route::get('show/{id}', [ADCategoryController::class, 'show'])->name('backend.category.show');
        Route::get('{id}/status', [ADCategoryController::class, 'status'])->name('backend.category.status');
        Route::get('{id}/delete', [ADCategoryController::class, 'delete'])->name('backend.category.delete');
        Route::get('{id}/restore', [ADCategoryController::class, 'restore'])->name('backend.category.restore');
        Route::delete('{id}', [ADCategoryController::class, 'destroy'])->name('backend.category.destroy');
    });
    //contact
    Route::prefix('contact')->group(function () {
        Route::get('/', [ADContactController::class, 'index'])->name('backend.contact.index');
        Route::get('trash', [ADContactController::class, 'trash'])->name('backend.contact.trash');
        Route::get('create', [ADContactController::class, 'create'])->name('backend.contact.create');
        Route::post('store', [ADContactController::class, 'store'])->name('backend.contact.store');
        Route::get('{id}/edit', [ADContactController::class, 'edit'])->name('backend.contact.edit');
        Route::put('{id}/update', [ADContactController::class, 'update'])->name('backend.contact.update');
        Route::get('show/{id}', [ADContactController::class, 'show'])->name('backend.contact.show');
        Route::get('{id}/status', [ADContactController::class, 'status'])->name('backend.contact.status');
        Route::get('{id}/delete', [ADContactController::class, 'delete'])->name('backend.contact.delete');
        Route::get('{id}/restore', [ADContactController::class, 'restore'])->name('backend.contact.restore');
        Route::delete('{id}', [ADContactController::class, 'destroy'])->name('backend.contact.destroy');
    });
    //Menu
    Route::prefix('menu')->group(function () {
        Route::get('/', [ADMenuController::class, 'index'])->name('backend.menu.index');
        Route::get('trash', [ADMenuController::class, 'trash'])->name('backend.menu.trash');
        Route::get('create', [ADMenuController::class, 'create'])->name('backend.menu.create');
        Route::post('store', [ADMenuController::class, 'store'])->name('backend.menu.store');
        Route::get('{id}/edit', [ADMenuController::class, 'edit'])->name('backend.menu.edit');
        Route::put('{id}/update', [ADMenuController::class, 'update'])->name('backend.menu.update');
        Route::get('show/{id}', [ADMenuController::class, 'show'])->name('backend.menu.show');
        Route::get('{id}/status', [ADMenuController::class, 'status'])->name('backend.menu.status');
        Route::get('{id}/delete', [ADMenuController::class, 'delete'])->name('backend.menu.delete');
        Route::get('{id}/restore', [ADMenuController::class, 'restore'])->name('backend.menu.restore');
        Route::delete('{id}', [ADMenuController::class, 'destroy'])->name('backend.menu.destroy');
    });
    //product
    Route::prefix('product')->group(function () {
        Route::get('/', [ADProductController::class, 'index'])->name('backend.product.index');
        Route::get('trash', [ADProductController::class, 'trash'])->name('backend.product.trash');
        Route::get('create', [ADProductController::class, 'create'])->name('backend.product.create');
        Route::post('store', [ADProductController::class, 'store'])->name('backend.product.store');
        Route::get('{id}/edit', [ADProductController::class, 'edit'])->name('backend.product.edit');
        Route::put('{id}/update', [ADProductController::class, 'update'])->name('backend.product.update');
        Route::get('show/{id}', [ADProductController::class, 'show'])->name('backend.product.show');
        Route::get('{id}/status', [ADProductController::class, 'status'])->name('backend.product.status');
        Route::get('{id}/delete', [ADProductController::class, 'delete'])->name('backend.product.delete');
        Route::get('{id}/restore', [ADProductController::class, 'restore'])->name('backend.product.restore');
        Route::delete('/{id}', [ADProductController::class, 'destroy'])->name('backend.product.destroy');
    });

    //order
    Route::prefix('order')->group(function () {
        Route::get('/', [ADOrderController::class, 'index'])->name('backend.order.index');
        Route::get('trash', [ADOrderController::class, 'trash'])->name('backend.order.trash');
        Route::get('create', [ADOrderController::class, 'create'])->name('backend.order.create');
        Route::post('store', [ADOrderController::class, 'store'])->name('backend.order.store');
        Route::get('{id}/edit', [ADOrderController::class, 'edit'])->name('backend.order.edit');
        Route::put('{id}/update', [ADOrderController::class, 'update'])->name('backend.order.update');
        Route::get('show/{id}', [ADOrderController::class, 'show'])->name('backend.order.show');
        Route::get('{id}/status', [ADOrderController::class, 'status'])->name('backend.order.status');
        Route::get('{id}/delete', [ADOrderController::class, 'delete'])->name('backend.order.delete');
        Route::get('{id}/restore', [ADOrderController::class, 'restore'])->name('backend.order.restore');
        Route::delete('{id}', [ADOrderController::class, 'destroy'])->name('backend.order.destroy');
    });
    //post
    Route::prefix('post')->group(function(){
        Route::get('/', [ADPostController::class, 'index'])->name('backend.post.index');
        Route::get('trash', [ADPostController::class, 'trash'])->name('backend.post.trash');
        Route::get('create', [ADPostController::class, 'create'])->name('backend.post.create');
        Route::post('store', [ADPostController::class, 'store'])->name('backend.post.store');
        Route::get('{id}/edit', [ADPostController::class, 'edit'])->name('backend.post.edit');
        Route::put('{id}/update', [ADPostController::class, 'update'])->name('backend.post.update');
        Route::get('show/{id}', [ADPostController::class, 'show'])->name('backend.post.show');
        Route::get('{id}/status', [ADPostController::class, 'status'])->name('backend.post.status');
        Route::get('{id}/delete', [ADPostController::class, 'delete'])->name('backend.post.delete');
        Route::get('{id}/restore', [ADPostController::class, 'restore'])->name('backend.post.restore');
        Route::delete('{id}', [ADPostController::class, 'destroy'])->name('backend.post.destroy');
    });
    //topic
    Route::prefix('topic')->group(function(){
        Route::get('/', [ADTopicController::class, 'index'])->name('backend.topic.index');
        Route::get('trash', [ADTopicController::class, 'trash'])->name('backend.topic.trash');
        Route::get('create', [ADTopicController::class, 'create'])->name('backend.topic.create');
        Route::post('store', [ADTopicController::class, 'store'])->name('backend.topic.store');
        Route::get('{id}/edit', [ADTopicController::class, 'edit'])->name('backend.topic.edit');
        Route::put('{id}/update', [ADTopicController::class, 'update'])->name('backend.topic.update');
        Route::get('show/{id}', [ADTopicController::class, 'show'])->name('backend.topic.show');
        Route::get('{id}/status', [ADTopicController::class, 'status'])->name('backend.topic.status');
        Route::get('{id}/delete', [ADTopicController::class, 'delete'])->name('backend.topic.delete');
        Route::get('{id}/restore', [ADTopicController::class, 'restore'])->name('backend.topic.restore');
        Route::delete('{id}', [ADTopicController::class, 'destroy'])->name('backend.topic.destroy');
    });
    //user
    Route::prefix('user')->group(function(){
        Route::get('/', [ADUserController::class, 'index'])->name('backend.user.index');
        Route::get('trash', [ADUserController::class, 'trash'])->name('backend.user.trash');
        Route::get('create', [ADUserController::class, 'create'])->name('backend.user.create');
        Route::post('store', [ADUserController::class, 'store'])->name('backend.user.store');
        Route::get('{id}/edit', [ADUserController::class, 'edit'])->name('backend.user.edit');
        Route::put('{id}/update', [ADUserController::class, 'update'])->name('backend.user.update');
        Route::get('show/{id}', [ADUserController::class, 'show'])->name('backend.user.show');
        Route::get('{id}/status', [ADUserController::class, 'status'])->name('backend.user.status');
        Route::get('{id}/delete', [ADUserController::class, 'delete'])->name('backend.user.delete');
        Route::get('{id}/restore', [ADUserController::class, 'restore'])->name('backend.user.restore');
        Route::delete('{id}', [ADUserController::class, 'destroy'])->name('backend.user.destroy');
    });
});
