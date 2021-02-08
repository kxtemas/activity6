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
Route::get('jobListings', function () {
    return view('jobListings');});

Route::get('Blog', function () {
    return view('Blog');});

Route::get('Profile', function () {
    return view('Profile');});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/doeditprofile', 'ProfileController@update');
Route::get('/profile', function () {
    return view('profile');
});
    
    //routes for login and register form actions
    Route::post('/doLogin','User\LoginController@attemptLogin');
    Route::post('/doRegister','User\RegisterController@attemptRegister');
    
    //routes for login and register views
    Route::get('register', ['as' => 'register', 'uses' => 'User\RegisterController@index']);
    Route::get('login', ['as' => 'login', 'uses' => 'User\LoginController@index']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'User\LoginController@logout']);
    
    
    Auth::routes();
    
    Route::get('/home', 'HomeController@index')->name('home');
    
    //create for redirect to admin panel using middleware (we have changes in AdminMiddleware,kernel,LoginController files //here auth and admin indicate to folder)
    Route::group(['middleware'  => ['auth','admin']], function() {
    Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });
           });
       
Route::get('/userlist', function () {
   return view('admin.register-edit'); 
        });
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/admin/delete', 'AdminController@showDelete');
Route::post('/admin/suspend', 'AdminController@showSuspend');
Route::post('/admin/reactivate', 'AdminController@showReactivate');

