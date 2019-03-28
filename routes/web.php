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

Route::get('change/{locale}', function ($locale) {
	App::setLocale($locale);
  session(['locale' => $locale]);
  return Redirect::back();
});

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

Route::get('product_1/{id}', 'HomeController@product_get');

Route::get('themes/{id}', 'HomeController@themes_pro');


Route::get('photo_edit/{id}', 'HomeController@photo_edit')->name('photo_edit');
Route::post('/del_upload_image', 'HomeController@del_upload_image')->name('del_upload_image');

Route::post('/del_cart', 'HomeController@del_cart')->name('del_cart');

Route::post('/add_qty2_photo', 'HomeController@add_qty2_photo')->name('add_qty2_photo');

Route::post('/update_photo_print', 'HomeController@update_photo_print')->name('update_photo_print');

Route::get('photo_print/{id}', 'HomeController@photo_print')->name('photo_print');

Route::get('/cart', 'HomeController@cart')->name('cart');

Route::post('/upload_image', 'HomeController@upload_image')->name('upload_image');
Route::post('/images_delete', 'HomeController@images_delete')->name('images_delete');

Route::get('/new_arrivals', 'HomeController@new_arrivals')->name('new_arrivals');

Route::get('/what_hot', 'HomeController@what_hot')->name('what_hot');

Route::get('/what_new', 'HomeController@what_new')->name('what_new');

Route::post('update_product_option', 'HomeController@update_product_option');

Route::get('payment/{id}', 'HomeController@payment')->name('payment');
Route::post('paypal', 'PaymentController@payWithpaypal')->name('payWithpaypal');
Route::get('status', 'PaymentController@getPaymentStatus');

Route::get('payment_notify', 'UserProfileController@payment_notify');
Route::post('post_payment_notify', 'UserProfileController@post_payment_notify');
Route::get('payment_notify_success', 'UserProfileController@payment_notify_success');

Route::get('category/{id}', 'HomeController@category');

// Social Auth
Route::get('auth/social', 'Auth\SocialAuthController@show')->name('social.login');
Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');

Route::group(['middleware' => 'auth'], function () {


  Route::post('/add_address_order', 'HomeController@add_address_order')->name('add_address_order');
  Route::get('/profile', 'HomeController@profile')->name('profile');
  Route::get('/shipping', 'HomeController@shipping')->name('shipping');
  Route::post('/add_order', 'HomeController@add_order')->name('add_order');
  Route::post('/update_profile', 'HomeController@update_profile')->name('update_profile');
  Route::get('profile/{id}/edit', 'HomeController@profile_edit')->name('profile_edit');
  Route::post('/post_edit_profile', 'UserProfileController@post_edit_profile')->name('post_edit_profile');
  Route::get('/address_book', 'UserProfileController@address_book')->name('address_book');
  Route::get('edit_address_book/{id}', 'UserProfileController@edit_address_book')->name('edit_address_book');
  Route::post('/post_edit_address_book', 'UserProfileController@post_edit_address_book')->name('post_edit_address_book');
  Route::post('/delete_address_book', 'UserProfileController@delete_address_book')->name('delete_address_book');
  Route::get('/new_address_book', 'UserProfileController@new_address_book')->name('new_address_book');
  Route::post('/post_new_address_book', 'UserProfileController@post_new_address_book')->name('post_new_address_book');

  Route::get('/my_order', 'UserProfileController@my_order')->name('my_order');
  Route::get('my_order_detail/{id}', 'UserProfileController@my_order_detail')->name('my_order_detail');
	Route::get('pay_order_choose/{id}', 'UserProfileController@pay_order_choose')->name('pay_order_choose');
	Route::get('pay_order_detail/{id}', 'UserProfileController@payment_notify_id')->name('pay_order_detail');

});

Route::group(['middleware' => 'admin'], function() {

  Route::get('admin/load_img/{id}', 'OrderController@load_img');

  Route::post('admin/delete_user_address/', 'StudentController@delete_user_address');
  Route::get('admin/edit_user_address/{id}', 'StudentController@edit_user_address');
  Route::post('post_edit_address/', 'StudentController@post_edit_address');
  Route::post('post_new_address/', 'StudentController@post_new_address');
  Route::get('admin/new_user_address/{id}', 'StudentController@new_user_address');
  Route::resource('admin/themes', 'ThemeproController');
	Route::resource('admin/user', 'StudentController');
  Route::resource('admin/category', 'CategoryController');
  Route::resource('admin/sub_category', 'Sub_categoryController');
  Route::resource('admin/product', 'ProductController');
  Route::resource('admin/option_product', 'OptionProController');
  Route::resource('admin/delivery', 'DeliveryController');
  Route::resource('admin/bank', 'BankController');
  Route::post('admin/option_product_item/', 'OptionProController@option_product_item');
  Route::post('admin/option_product_item_edit/{id}', 'OptionProController@option_product_item_edit');
  Route::post('admin/option_product_item_del/{id}', 'OptionProController@option_product_item_del');
  Route::get('admin/product_gallery/{id}', 'ProductController@product_gallery');
  Route::post('admin/add_gallery/', 'ProductController@add_gallery');
  Route::post('property_image_del', 'ProductController@property_image_del');
  Route::post('api/api_post_status', 'ProductController@api_post_status');
  Route::resource('admin/photo', 'PhotoController');
  Route::resource('admin/order', 'OrderController');
  Route::post('api/api_order_status', 'OrderController@api_order_status');
  Route::resource('admin/slide', 'SlideController');
  Route::post('api/api_slide_status', 'SlideController@api_slide_status');
  Route::get('admin/get_pay_info', 'PaymentController@get_pay_info');
  Route::post('admin/del_pay_info', 'PaymentController@del_pay_info');
  Route::get('admin/edit_pay_info/{id}/edit', 'PaymentController@edit_pay_info');
  Route::post('admin/post_pay_info', 'PaymentController@post_pay_info');


});
