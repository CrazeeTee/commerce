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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/shop', 'HomeController@shop')->name('shop');
Route::get('/expert', 'HomeController@expert')->name('expert');
Route::get('/admin', 'HomeController@admin')->name('admin');
Route::get('/moderator', 'HomeController@moderator')->name('moderator');


/** User */
Auth::routes();

Route::get('/activate/email/{token}', 'Auth\ActivationTokenController@activate')->name('activate.email');
Route::get('/activate/resend', 'Auth\ActivationTokenController@resend')->name('resend.email');

Route::get('/user/home', 'UserController@index')->name('user.index');
Route::get('/user/{user}', 'UserController@show')->name('user.show');
Route::get('/user/{user}/edit', 'UserController@edit')->name('user.edit');
Route::post('/user/{user}/edit', 'UserController@update');


/** Shop */
Route::get('/shop/register', 'Shop\RegisterController@showRegistrationForm')->name('shop.register');
Route::post('/shop/register', 'Shop\RegisterController@register');
Route::get('/shop/login', 'Shop\LoginController@showLoginForm')->name('shop.login');
Route::post('/shop/login', 'Shop\LoginController@login');
Route::post('/shop/logout', 'Shop\LoginController@logout')->name('shop.logout');
Route::get('/shop/password/reset', 'Shop\ForgotPasswordController@showLinkRequestForm')->name('shop.password.request');
Route::post('/shop/password/email', 'Shop\ForgotPasswordController@sendResetLinkEmail')->name('shop.password.email');
Route::get('/shop/password/reset/{token}', 'Shop\ResetPasswordController@showResetForm')->name('shop.password.reset');
Route::post('/shop/password/reset', 'Shop\ResetPasswordController@reset');

Route::get('/shop/activate/email/{token}', 'Shop\ActivationTokenController@activate')->name('shop.activate.email');
Route::get('/shop/activate/resend', 'Shop\ActivationTokenController@resend')->name('shop.resend.email');

Route::get('/shop/home', 'ShopController@index')->name('shop.index');
Route::get('/shop/{shop}', 'ShopController@show')->name('shop.show');
Route::get('/shop/{shop}/edit', 'ShopController@edit')->name('shop.edit');
Route::post('/shop/{shop}/edit', 'ShopController@update');
Route::get('/shop/{shop}/upload', 'ShopController@getUploadForm')->name('shop.upload');
Route::post('/shop/{shop}/upload', 'ShopController@upload');


/** Expert */
Route::get('/expert/register', 'Expert\RegisterController@showRegistrationForm')->name('expert.register');
Route::post('/expert/register', 'Expert\RegisterController@register');
Route::get('/expert/login', 'Expert\LoginController@showLoginForm')->name('expert.login');
Route::post('/expert/login', 'Expert\LoginController@login');
Route::post('/expert/logout', 'Expert\LoginController@logout')->name('expert.logout');
Route::get('/expert/password/reset', 'Expert\ForgotPasswordController@showLinkRequestForm')->name('expert.password.request');
Route::post('/expert/password/email', 'Expert\ForgotPasswordController@sendResetLinkEmail')->name('expert.password.email');
Route::get('/expert/password/reset/{token}', 'Expert\ResetPasswordController@showResetForm')->name('expert.password.reset');
Route::post('/expert/password/reset', 'Expert\ResetPasswordController@reset');

Route::get('/expert/activate/email/{token}', 'Expert\ActivationTokenController@activate')->name('expert.activate.email');
Route::get('/expert/activate/resend', 'Expert\ActivationTokenController@resend')->name('expert.resend.email');

Route::get('/expert/home', 'ExpertController@index')->name('expert.index');
Route::get('/expert/{expert}', 'ExpertController@show')->name('expert.show');
Route::get('/expert/{expert}/edit', 'ExpertController@edit')->name('expert.edit');
Route::post('/expert/{expert}/edit', 'ExpertController@update');
Route::get('/expert/{expert}/upload', 'ExpertController@getUploadForm')->name('expert.upload');
Route::post('/expert/{expert}/upload', 'ExpertController@upload');


/** Admin */
Route::get('/admin/register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('/admin/register', 'Admin\RegisterController@register');
Route::get('/admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\LoginController@login');
Route::post('/admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
Route::get('/admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/admin/password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/admin/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('/admin/password/reset', 'Admin\ResetPasswordController@reset');

Route::get('/admin/activate/email/{token}', 'Admin\ActivationTokenController@activate')->name('admin.activate.email');
Route::get('/admin/activate/resend', 'Admin\ActivationTokenController@resend')->name('admin.resend.email');

Route::get('/moderator/home', 'ModeratorController@index')->name('moderator.index');
Route::get('/moderator/{admin}', 'ModeratorController@show')->name('moderator.show');
Route::get('/moderator/{admin}/edit', 'ModeratorController@edit')->name('moderator.edit');
Route::post('/moderator/{admin}/edit', 'ModeratorController@update');
Route::get('/moderator/{admin}/upload', 'ModeratorController@getUploadForm')->name('moderator.upload');
Route::post('/moderator/{admin}/upload', 'ModeratorController@upload');

Route::get('/admin/home', 'AdminController@index')->name('admin.index');
Route::get('/admin/{admin}', 'AdminController@show')->name('admin.show');
Route::get('/admin/{admin}/edit', 'AdminController@edit')->name('admin.edit');
Route::post('/admin/{admin}/edit', 'AdminController@update');
Route::get('/admin/{admin}/upload', 'AdminController@getUploadForm')->name('admin.upload');
Route::post('/admin/{admin}/upload', 'AdminController@upload');