<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;




Route::get('/',[PageController::class,'index'])->name('frontend.index');
Route::get('/shop',[PageController::class,'shop'])->name('frontend.shop');
Route::get('/about',[PageController::class,'about'])->name('frontend.about');
Route::get('/contact',[PageController::class,'contact'])->name('frontend.contact');
Route::get('/login',[UserController::class,'loginPage'])->name('frontend.loginPage');
Route::get('/registerForm',[UserController::class,'registerForm'])->name('frontend.registerForm');
Route::post('/register',[UserController::class,'register'])->name('frontend.register');
Route::post('/login',[UserController::class,'login'])->name('frontend.login');
Route::get('/cart',[PageController::class,'cart'])->name('frontend.cart');
Route::get('/product-detail/{id}',[PageController::class,'productDetail'])->name('frontend.detail');




// //Admin Dashboard
// Route::get('/index',[PageController::class,'dashboard'])->name('admin.dashboard');

//brand
Route::get('/brandList',[BrandController::class,'BrandList'])->name('BrandList');
Route::post('/brand/store',[BrandController::class,'StoreBrand'])->name('brandStore');
Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');

//catagory
Route::get('/categoryList',[CategoryController::class,'categoryList'])->name('categoryList');
Route::post('/category/store',[CategoryController::class,'StoreCategory'])->name('categoryStore');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');


//product
Route::get('/admin/dashboard', [ProductController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');
Route::get('/admin/create/products', [ProductController::class, 'create'])->name('admin.products.create');
Route::post('/admin/store/products', [ProductController::class, 'store'])->name('admin.products.store');
Route::get('/admin/edit/products/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
Route::post('/admin/update/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
Route::get('/admin/delete/products/{id}', [ProductController::class, 'delete'])->name('admin.products.delete');

//login
