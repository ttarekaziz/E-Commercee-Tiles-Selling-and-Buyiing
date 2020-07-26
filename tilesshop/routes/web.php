<?php

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

Route::get('/', function () {
    return view('frontend.welcome');
});

Route::get('/rhome', function () {
    return view('frontend.welcome');
})->name('homeroute');




Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contactroute');


/*products for user view*/
Route::get('/shopproduct','ProductController@shopproduct')->name('shopproductroute');
Route::get('/shopproduct/{id}','ProductController@signleProduct')->name('single.product');



Route::group(['middleware'=>'auth'], function () {

//<<<<<<<<<<<<<<<<<<<<<<<<<admin>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
Route::get('/home', 'AdminController@home')
	->name('adminhomeroute');

/*category*/
Route::get('/categorylist', 'CategoryController@category')
	->name('categorylistroute');

Route::post('/create','CategoryController@create')->name('categorycreateroute');

Route::get('/category/{id}/edit', 'CategoryController@edit')
	->name('categoryeditroute');

	Route::post('/category/{id}/update','CategoryController@update')->name('categoryupdate');

	Route::get('/category/{id}/delete','CategoryController@delete')->name('categorydelete');

/*product activities for admin*/
Route::get('/productlist','ProductController@list')->name('productlistroute');
Route::get('/productcreate','ProductController@createForm')->name('productcreateroute');

Route::post('/create-product','ProductController@create')->name('productcreateroute2');

Route::get('/product/{id}/edit', 'ProductController@edit')
	->name('producteditroute');

	Route::put('/product/{id}/update','ProductController@update')->name('productupdate');

	Route::get('/product/{id}/delete','ProductController@delete')->name('productdelete');

    Route::get('/orderlist','CheckoutController@pendingorderlist')->name('pendingorderlist');
    Route::get('/completeorderlist','CheckoutController@completeorderlist')->name('completeorderlist');

    Route::get('/cancelorderlist','CheckoutController@cancelorderlist')->name('cancelorderlist');
});


//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>cart>>>>>>>>>>>>>>>>>>>>>>>>>>>>>|

Route::group(['middleware' => ['auth']], function () {
    Route::get('/cart', 'CartController@cart')->name('cart');
    Route::get('/addtocart/{pid}', 'CartController@addcart')->name('addToCart');
    Route::post('/cart', 'CartController@updateCart')->name('updateCart');

    Route::get('/buynow/{pid}', 'CartController@buyNow')->name('buynow');
    Route::get('/remove_cart_product/{pid}', 'CartController@cartRemove')->name('cart.remove');

    Route::get('/completeorders', 'CheckoutController@mycompleteorder')->name('mycompleteorders');
    Route::get('/mypendingorders', 'CheckoutController@mypendingorder')->name('mypendingorders');

Route::get('//oreder/{id}/cancel1', 'CheckoutController@cancelorder')->name('cancelorderroute');

Route::post('/order/{id}/cancel','CheckoutController@confirmcancelorder')->name('confirmcancelroute');


    Route::get('/order/{id}', 'CheckoutController@showOrder')->name('admin.order.show');
   

    Route::post('/checkout/order', 'CheckoutController@placeOrder')->name('checkout.place.order');

    Route::get('/oreder/{id}/accept','CheckoutController@orderaccept')->name('acceptemorderroute');

    Route::post('/order/{id}/confirm','CheckoutController@confirmorder')->name('confirmorderroute');



	//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>update leter>>>|

Route::get('/adminorders', 'AdminController@orders')->name('adminordersroute');

Route::get('/adminproducts', 'AdminController@products')->name('adminproductsroute');

Route::get('/admincustomers', 'AdminController@list')->name('admincustomersroute');

Route::get('/adminreports', 'AdminController@reports')->name('adminreportsroute');

Route::get('/productadd', 'AdminController@addproduct')->name('addproductroute');

});