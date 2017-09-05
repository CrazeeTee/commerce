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

Auth::routes();

/** Auth User */
Auth::routes();

Route::get('/activate/email/{token}', 'Auth\ActivationTokenController@activate')->name('activate.email');
Route::get('/activate/resend', 'Auth\ActivationTokenController@resend')->name('resend.email');

Route::get('user/home', 'UserController@index')->name('user.index');

/**Auth Shop */
Route::get('shop/register', 'Shop\RegisterController@showRegistrationForm')->name('shop.register');
Route::post('shop/register', 'Shop\RegisterController@register');
Route::get('shop', 'Shop\LoginController@showLoginForm')->name('shop.login');
Route::post('shop', 'Shop\LoginController@login');
Route::post('shop/logout', 'Shop\LoginController@logout')->name('shop.logout');
Route::post('shop/password/email', 'Shop\ForgotPasswordController@sendResetLinkEmail')->name('shop.password.email');
Route::get('shop/password/reset', 'Shop\ForgotPasswordController@showLinkRequestForm')->name('shop.password.request');
Route::post('shop/password/reset', 'Shop\ResetPasswordController@reset');
Route::get('shop/password/reset/{token}', 'Shop\ResetPasswordController@showResetForm')->name('shop.password.reset');
Route::get('shop/activate/email/{token}', 'Shop\ActivationTokenController@activate')->name('shop.activate.email');
Route::get('shop/activate/resend', 'Shop\ActivationTokenController@resend')->name('shop.resend.email');

Route::get('shop/home', 'ShopController@index')->name('shop.index');

/**Auth Expert */
Route::get('expert/register', 'Expert\RegisterController@showRegistrationForm')->name('expert.register');
Route::post('expert/register', 'Expert\RegisterController@register');
Route::get('expert', 'Expert\LoginController@showLoginForm')->name('expert.login');
Route::post('expert', 'Expert\LoginController@login');
Route::post('expert/logout', 'Expert\LoginController@logout')->name('expert.logout');
Route::post('expert/password/email', 'Expert\ForgotPasswordController@sendResetLinkEmail')->name('expert.password.email');
Route::get('expert/password/reset', 'Expert\ForgotPasswordController@showLinkRequestForm')->name('expert.password.request');
Route::post('expert/password/reset', 'Expert\ResetPasswordController@reset');
Route::get('expert/password/reset/{token}', 'Expert\ResetPasswordController@showResetForm')->name('expert.password.reset');
Route::get('expert/activate/email/{token}', 'Expert\ActivationTokenController@activate')->name('expert.activate.email');
Route::get('expert/activate/resend', 'Expert\ActivationTokenController@resend')->name('expert.resend.email');

Route::get('expert/home', 'ExpertController@index')->name('expert.index');

/**Auth Admin */
Route::get('admin/register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('admin/register', 'Admin\RegisterController@register');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
Route::post('admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
Route::post('admin/password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/reset', 'Admin\ResetPasswordController@reset');
Route::get('admin/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::get('admin/activate/email/{token}', 'Admin\ActivationTokenController@activate')->name('admin.activate.email');
Route::get('admin/activate/resend', 'Admin\ActivationTokenController@resend')->name('admin.resend.email');

Route::get('admin/home', 'AdminController@index')->name('admin.index');
Route::get('moderator/home', 'ModeratorController@index')->name('moderator.index');