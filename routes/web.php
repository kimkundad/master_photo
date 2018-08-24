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

Route::auth();

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'HomeController@index')->name('home');

Route::get('about', 'HomeController@about')->name('about');
Route::get('product_price', 'HomeController@product_price')->name('product_price');
Route::get('product_price_2', 'HomeController@product_price_2')->name('product_price_2');
Route::get('options_derivatives', 'HomeController@options_derivatives')->name('options_derivatives');
Route::get('kerry_express', 'HomeController@kerry_express')->name('kerry_express');
Route::get('ems_thai', 'HomeController@ems_thai')->name('ems_thai');
Route::get('delivery', 'HomeController@delivery')->name('delivery');
Route::get('contact_master', 'HomeController@contact_master')->name('contact_master');
Route::get('payment_option', 'HomeController@payment_option')->name('payment_option');
Route::get('terms_conditions', 'HomeController@terms_conditions')->name('terms_conditions');


Route::get('photo_edit/{id}', 'HomeController@photo_edit')->name('photo_edit');
Route::post('/del_upload_image', 'HomeController@del_upload_image')->name('del_upload_image');

Route::post('/add_qty2_photo', 'HomeController@add_qty2_photo')->name('add_qty2_photo');

Route::post('/update_photo_print', 'HomeController@update_photo_print')->name('update_photo_print');

Route::get('photo_print/{id}', 'HomeController@photo_print')->name('photo_print');

Route::get('/cart', 'HomeController@cart')->name('cart');

Route::post('/upload_image', 'HomeController@upload_image')->name('upload_image');
Route::post('/images_delete', 'HomeController@images_delete')->name('images_delete');

Route::get('payment/{id}', 'HomeController@payment')->name('payment');
Route::post('paypal', 'PaymentController@payWithpaypal')->name('payWithpaypal');
Route::get('status', 'PaymentController@getPaymentStatus');

Route::get('category/{id}', 'HomeController@category');

// Social Auth
Route::get('auth/social', 'Auth\SocialAuthController@show')->name('social.login');
Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');

Route::group(['middleware' => 'auth'], function () {

  Route::get('/profile', 'HomeController@profile')->name('profile');
  Route::get('/shipping', 'HomeController@shipping')->name('shipping');
  Route::post('/add_order', 'HomeController@add_order')->name('add_order');



});

Route::group(['middleware' => 'admin'], function() {
  Route::resource('admin/user', 'StudentController');
  Route::resource('admin/category', 'CategoryController');
  Route::resource('admin/sub_category', 'Sub_categoryController');
  Route::resource('admin/product', 'ProductController');
  Route::resource('admin/option_product', 'OptionProController');
  Route::post('admin/option_product_item/', 'OptionProController@option_product_item');
  Route::post('admin/option_product_item_edit/{id}', 'OptionProController@option_product_item_edit');
  Route::post('admin/option_product_item_del/{id}', 'OptionProController@option_product_item_del');
  Route::get('admin/product_gallery/{id}', 'ProductController@product_gallery');
  Route::post('admin/add_gallery/', 'ProductController@add_gallery');
  Route::post('property_image_del', 'ProductController@property_image_del');
  Route::post('api/api_post_status', 'ProductController@api_post_status');
  Route::resource('admin/photo', 'PhotoController');


});
