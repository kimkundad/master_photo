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

Route::get('photo_edit/{id}', 'HomeController@photo_edit')->name('photo_edit');
Route::post('/del_upload_image', 'HomeController@del_upload_image')->name('del_upload_image');


Route::get('/photo_print', 'HomeController@photo_print')->name('photo_print');

Route::post('/upload_image', 'HomeController@upload_image')->name('upload_image');
Route::post('/images_delete', 'HomeController@images_delete')->name('images_delete');


// Social Auth
Route::get('auth/social', 'Auth\SocialAuthController@show')->name('social.login');
Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');

Route::group(['middleware' => 'auth'], function () {

  Route::get('/profile', 'HomeController@profile')->name('profile');

});

Route::group(['middleware' => 'admin'], function() {

});
