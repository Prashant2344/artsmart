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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('/admin')->group(function () {

    Route::get('/login', 'Admin\Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('/logout','Admin\Auth\AdminLoginController@logout')->name('admin.logout');

//////////////////////////////////////Admin Forget Password////////////////////////////
    Route::post('/password/email','Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Admin\Auth\ResetPasswordController@reset');
    Route::get('/password/reset/{token}','Admin\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');

//////////////////////////////////////Admin Route ////////////////////////
    Route::get('/admins','Admin\AdminController@index');
    Route::get('/admins/create','Admin\AdminController@create');
    Route::post('/admins/add','Admin\AdminController@store');
    Route::get('/admins/edit/{admin}','Admin\AdminController@edit');
    Route::post('/admins/edit/{admin}','Admin\AdminController@update');
    Route::get('/admins/delete/{admin}','Admin\AdminController@destroy');

//////////////////////////////////////////Category Route////////////////////////////
    Route::get('/categories', 'Admin\CategoryController@index');
    Route::get('/categories/create','Admin\CategoryController@create');
    Route::post('/categories/add', 'Admin\CategoryController@store');
    Route::get('/categories/edit/{category}','Admin\CategoryController@edit');
    Route::post('/categories/edit/{category}','Admin\CategoryController@update');
    Route::get('/categories/delete/{category}','Admin\CategoryController@destroy');

////////////////////////////////////////Setting Route //////////////////////////////////
    Route::get('/settings','Admin\SettingController@create');
    Route::post('/settings/add','Admin\SettingController@store');
    Route::post('/settings/edit/{setting}','Admin\SettingController@update');

//////////////////////////////////////Article Route////////////////////////////
    Route::get('/arts','Admin\ArtController@index');
    Route::get('/arts/create','Admin\ArtController@create');
    Route::post('/arts/add','Admin\ArtController@store');
    Route::get('/arts/edit/{art}','Admin\ArtController@edit');
    Route::post('/arts/edit/{art}','Admin\ArtController@update');
    Route::get('/arts/delete/{art}','Admin\ArtController@destroy');

//////////////////////////////////////User Route ////////////////////////
    Route::get('/users','Admin\UserController@index');
    Route::get('/users/create','Admin\UserController@create');
    Route::post('/users/add','Admin\UserController@store');
    Route::get('/users/edit/{user}','Admin\UserController@edit');
    Route::post('/users/edit/{user}','Admin\UserController@update');
    Route::get('/users/delete/{user}','Admin\UserController@destroy');

///////////////////////////////////Gallary Route//////////////////////////////////////////
    Route::get('galleries','Admin\GalleryController@index');
    Route::get('galleries/create','Admin\GalleryController@create');
    Route::post('galleries/add','Admin\GalleryController@store');
    Route::get('galleries/edit/{gallery}','Admin\GalleryController@edit');
    Route::post('galleries/edit/{gallery}','Admin\GalleryController@update');
    Route::get('galleries/delete/{gallery}','Admin\GalleryController@destroy');
    Route::get('photo/delete/{photo}','Admin\GalleryController@delete');

//////////////////////////////////////Advertisements Route ////////////////////////
    Route::get('advertisements','Admin\AdvertisementController@index');
    Route::get('advertisements/create','Admin\AdvertisementController@create');
    Route::post('advertisements/add','Admin\AdvertisementController@store');
    Route::get('advertisements/edit/{advertisement}','Admin\AdvertisementController@edit');
    Route::post('advertisements/edit/{advertisement}','Admin\AdvertisementController@update');
    Route::get('advertisements/delete/{advertisement}','Admin\AdvertisementController@destroy');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/','WebsiteController@index');
    Route::get('/signup','Auth\LoginController@showRegisterForm');
    Route::post('/signup','Auth\LoginController@register');
    
    Route::get('/message', 'Auth\LoginController@message')->name('message');
    Route::get('/verification/{token}','Auth\LoginController@verification');

    Route::post('/userlogin','Auth\LoginController@ajaxlogin');
    Route::get('/profile', 'HomeController@index')->name('dashboard');
    Route::get('/posts','HomeController@posts')->name('posts');
    Route::get('/post/add','HomeController@create');
    Route::post('/post/add','HomeController@store');
    Route::get('/profile/edit','HomeController@edit');
    Route::post('/profile/edit','HomeController@update');
    Route::get('/post/{post}','HomeController@show');

    Route::get('/gallery','WebsiteController@gallery');
    Route::get('/gallery/{gallery}','WebsiteController@gallery_page');

    Route::get('logout','Auth\LoginController@userLogout')->name('user.logout');

    Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
    Route::get('login/{provider}/callback', 'Auth\LoginController@redirectToProvider');

    // Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
    // Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

    // Route::get('/{permalink}','WebsiteController@pages');