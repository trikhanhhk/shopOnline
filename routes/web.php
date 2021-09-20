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
//Auth::routes();
//mail
Route::get('/send-mail', 'Home\HomeController@sendMail');

//home
Route::post('/login', 'Home\UserController@login')->name('home.login');
Route::get('/home', 'Home\HomeController@index')->name('index');
Route::get('/home/search', 'Home\HomeController@search')->name('home.search');
Route::get('/history', 'Home\HomeController@history')->name('home.history')->middleware('can:view');
Route::get('/deleteBill/{id}', 'Home\HomeController@deleteBill')->name('home.deleteBill')->middleware('can:view');
Route::get('/history/{id}', 'Home\HomeController@historyDetail')->name('home.historyDetail')->middleware('can:view');
Route::get('/product/{pid}', 'Home\HomeController@detailProduct')->name('home.detailProduct');
Route::get('/add-to-cart/{id}', 'Home\HomeController@addToCart')->name('home.addToCart');
Route::get('/checkout', 'Home\HomeController@checkOut')->name('checkOut')->middleware('can:view');
Route::post('/createDB', 'Home\HomeController@createDB')->name('home.createDB')->middleware('can:view');
Route::get('/showCart', 'Home\HomeController@showCart')->name('home.showCart');
Route::get('/updateCart', 'Home\HomeController@updateCart')->name('home.updateCart');
Route::get('/deleteCart', 'Home\HomeController@deleteCart')->name('home.deleteCart');
Route::get('/typeProduct/{id}', 'Home\HomeController@product')->name('home.typeProduct');
Route::get('/contactUs', 'Home\HomeController@contactUs')->name('contactUs');
Route::get('/aboutUs', 'Home\HomeController@aboutUs')->name('aboutUs');
Route::post('/store', 'Home\UserController@store')->name('store');
Route::get('/returnPass', 'Home\UserController@returnPass')->name('home.returnPass');
Route::post('/postreturnpass', 'Home\UserController@postReturnPass')->name('home.postReturnPass');
Route::post('/update/{uid}', 'Home\UserController@updateMoney')->name('home.update')->middleware('can:view');
Route::get('/logout', 'Home\UserController@logout')->name('home.logout');
Route::get('/changepass', 'Home\UserController@changePass')->name('home.changePass')->middleware('can:view');
Route::post('/postchangepass', 'Home\UserController@postChangePass')->name('home.postChangePass')->middleware('can:view');
//admin

Route::match(['get'],'admin/login', 'admin\AdminController@loginView')->name('login');
//Route::get('admin/logout', 'admin\AdminController@logout')
Route::match(['post'],'admin/login-form', 'admin\AdminController@login');
Route::match(['get','post'],'admin/logout','admin\AdminController@logout');
Route::group(['middleware'=>'auth'], function() {
    Route::get('admin', 'admin\AdminController@homeAdmin')->name('home')->middleware('can:manager');

    Route::get('admin/users', 'admin\AdminController@getUsers')->name('view_users')->middleware('can:manager_user');
    Route::get('admin/users/add', 'admin\AdminController@addUsers')->name('add_users')->middleware('can:manager_user');
    Route::post('admin/users/insert', 'admin\AdminController@insertUser')->middleware('can:manager_user');
    Route::get('admin/users/edit/{id}', 'admin\AdminController@editUsers')->name('edit_users')->middleware('can:manager_user');
    Route::post("admin/users/update/{id}", 'admin\AdminController@updateUser')->middleware('can:manager_user');
    Route::post("admin/users/role-permission/{id}", 'admin\AdminController@getPermissionByRole')->middleware('can:manager_user');
    Route::get("admin/users/delete/{id}", 'admin\AdminController@deleteUser')->middleware('can:manager_user');
    Route::post("admin/users/update-role/{id}", 'admin\AdminController@updateRole')->middleware('can:manager_user');
    Route::get("admin/users/role/{role_id}", 'admin\AdminController@getUserByRole')->name("view_users")->middleware('can:manager_user');

    Route::get('admin/type-products', 'admin\AdminController@viewTypeProducts')->name('view_type_products')->middleware('can:manager');
    Route::get('admin/type-products/add', 'admin\AdminController@addTypeProducts')->name('add_type_products')->middleware('can:manager');
    Route::get('admin/type-products/edit', 'admin\AdminController@editTypeProducts')->name('edit_type_products')->middleware('can:manager');
    Route::post('admin/products/insert', 'admin\AdminController@insertTypeProducts')->middleware('can:manager'); // thêm TypeProduct vào db
    Route::post('admin/type-products/update/{id}', 'admin\AdminController@updateTypeProduct')->middleware('can:manager'); // cập nhật chỉnh sửa
    Route::get('admin/type-products/edit/{id}', 'admin\AdminController@editTypeProduct')->name('edit_type_products')->middleware('can:manager');
    Route::get('admin/type-products/delete/{id}', 'admin\AdminController@deleteTypeProduct')->name('view_type_products')->middleware('can:manager'); //xóa TypeProduct


    Route::get('admin/products', 'admin\AdminController@viewProducts')->name('view_products')->middleware('can:manager'); // view trang xem toàn bộ sản phẩm
    Route::get('admin/products/add', 'admin\AdminController@addProducts')->name('add_products')->middleware('can:manager'); // view trang thêm sản phẩm
    Route::post('admin/products/insert-products', 'admin\AdminController@insertProducts')->middleware('can:manager'); // thêm sản phẩm vào database
    Route::get('admin/products/edit/{id}', 'admin\AdminController@editProducts')->name('edit_products')->middleware('can:manager'); //view trang edit
    Route::post('admin/products/update/{id}', 'admin\AdminController@updateProducts')->middleware('can:manager'); // cập nhật chỉnh sửa
    Route::get('admin/products/delete/{id}', 'admin\AdminController@deleteProducts')->name('view_products')->middleware('can:manager');; //xóa sản phẩm

    Route::get('admin/products', 'admin\AdminController@viewProducts')->name('view_products')->middleware('can:manager');
    Route::get('admin/products/add', 'admin\AdminController@addProducts')->name('add_products')->middleware('can:manager');
    Route::get('admin/products/edit', 'admin\AdminController@editProducts')->name('edit_products')->middleware('can:manager');

    Route::get('admin/brands', 'admin\AdminController@viewBrands')->name('view_brands')->middleware('can:manager');
    Route::get('admin/brands/add', 'admin\AdminController@addBrands')->name('add_brands')->middleware('can:manager');
    Route::post('admin/brands/insert', 'admin\AdminController@insertBrands')->middleware('can:manager'); // thêm brand vào db
    Route::post('admin/brands/update/{id}', 'admin\AdminController@updateBrands')->middleware('can:manager'); // cập nhật chỉnh sửa
    Route::get('admin/brands/edit/{id}', 'admin\AdminController@editBrands')->name('edit_brands')->middleware('can:manager');
    Route::get('admin/brands/delete/{id}', 'admin\AdminController@deleteBrands')->name('view_brands')->middleware('can:manager'); //xóa Users

    Route::get('admin/bills/', 'admin\AdminController@getBills')->name('view_bills')->middleware('can:manager');
    Route::get('admin/bills/{status}', 'admin\AdminController@getBillsByStatus')->name('view_bills')->middleware('can:manager');
    Route::post('admin/bills/update/{id}', 'admin\AdminController@updateStatusBill')->middleware('can:manager');
    Route::get('admin/bills/delete/{id}', 'admin\AdminController@deleteBill')->name('view_bills')->middleware('can:manager');

    Route::get('admin/slides', 'admin\AdminController@viewSlide')->name('view_slides')->middleware('can:manager');
    Route::get('admin/slides/add', 'admin\AdminController@addSlide')->name('add_slide')->middleware('can:manager');
    Route::get('admin/slides/edit', 'admin\AdminController@editSlide')->name('edit_slide')->middleware('can:manager');
    Route::post('admin/slides/insert', 'admin\AdminController@insertSlide')->middleware('can:manager'); // thêm slide vào db
    Route::post('admin/slides/update/{id}', 'admin\AdminController@updateSlide')->middleware('can:manager'); // cập nhật chỉnh sửa
    Route::get('admin/slides/edit/{id}', 'admin\AdminController@editSlide')->name('edit_slide')->middleware('can:manager');
    Route::get('admin/slides/delete/{id}', 'admin\AdminController@deleteSlide')->name('view_slide')->middleware('can:manager'); //xóa slide

});
