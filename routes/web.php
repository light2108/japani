<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->namespace('Admin')->group(function(){
    Route::match(['get', 'post'], '/', 'AdminController@login');
    Route::group(['middleware'=>'admin'], function(){
        Route::get('/dashboard', 'AdminController@dashboard');
        Route::get('/logout', 'AdminController@logout');
        Route::match(['get', 'post'], '/account', 'AdminController@account');

        Route::get('/user-ordered', 'AdminController@ordered');
        Route::match(['get', 'post'], 'edit/ordered/{id}', 'AdminController@editOrdered');

        Route::get('/categories', 'CategoryController@index');
        Route::post('/add/category', 'CategoryController@create');
        Route::post('/edit/category/{id}', 'CategoryController@edit');
        Route::get('/delete/category/{id}', 'CategoryController@delete');

        Route::get('/type-products', 'TypeProductController@index');
        Route::post('/add/type-product', 'TypeProductController@create');
        Route::post('/edit/type-product/{id}', 'TypeProductController@edit');
        Route::get('/delete/type-product/{id}', 'TypeProductController@delete');

        Route::get('/products', 'ProductController@index');
        Route::match(['get','post'], '/add/product', 'ProductController@create');
        Route::match(['get','post'], '/edit/product/{id}', 'ProductController@edit');
        Route::get('/delete/product/{id}', 'ProductController@delete');
        Route::post('/change-type-product', 'ProductController@changeTypeProduct');

        Route::get('/banners', 'BannerController@index');
        Route::match(['get','post'], '/add/banner', 'BannerController@create');
        Route::match(['get','post'], '/edit/banner/{id}', 'BannerController@edit');
        Route::get('/delete/banner/{id}', 'BannerController@delete');

        Route::get('/posts', 'PostController@index');
        Route::match(['get','post'], '/add/post', 'PostController@create');
        Route::match(['get','post'], '/edit/post/{id}', 'PostController@edit');
        Route::get('/delete/post/{id}', 'PostController@delete');
    });
});
Route::namespace('Frontend')->group(function(){
    Route::get('/', 'UserController@index');
    
    Route::post('/login', 'UserController@login');
    Route::post('/register', 'UserController@register');
    Route::get('/detail/product/{id}', 'ProductController@detailProduct');
    Route::get('/type-product/{id}', 'ProductController@TypeProduct');
    Route::get('/category/{id}', 'ProductController@category');

    Route::get('/cart', 'CartController@index');
    Route::post('/cart/addcart', 'CartController@addcart');
    Route::post('/cart/addcart1', 'CartController@addcart1');
    Route::post('/cart/delete', 'CartController@deleteCart');
    Route::get('/infor-item', 'CartController@inforItem');

    Route::get('/order', 'OrderController@index');
    Route::post('/create-order', 'OrderController@create');
    Route::get('/order-tracking', 'OrderController@tracking');
    Route::get('/thanks', 'OrderController@thanks');

    Route::get('/banner2/{banner_id}/category/{category_id}', 'BannerController@second');
    Route::get('/banner5/{banner_id}/category/{category_id}', 'BannerController@fifth');
    Route::get('/banner1/{banner_id}/category/{category_id}', 'BannerController@first');
    Route::get('/banner3/{banner_id}/category/{category_id}', 'BannerController@third');

    Route::get('/detail/post/{post_id}', 'UserController@post');
    Route::get('/news', 'UserController@news');
    Route::post('/comments', 'UserController@comments');
    Route::get('/filter/category/{id}', 'ProductController@filterCategory');
    Route::get('/filter/type-product/{id}', 'ProductController@filterTypeProduct');
    Route::group(['middleware'=>'auth'], function(){
        Route::get('/logout', 'UserController@logout');
        Route::match(['get', 'post'], '/profile', 'UserController@profile');
        Route::match(['get','post'], '/change-password', 'UserController@changePassword');

    });
});
