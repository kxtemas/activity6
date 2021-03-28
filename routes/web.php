<?php

use App\Http\Controllers\JobController;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
//main page
Route::get('/', function () {return view('welcome');});
Route::get('/home', 'HomeController@index')->name('home');
// routes for login and register form actions
Route::post('/doLogin', 'User\LoginController@attemptLogin');
Route::post('/doRegister', 'User\RegisterController@attemptRegister');
// routes for login and register views and logout
Route::get('register', ['as' => 'register', 'uses' => 'User\RegisterController@index']);
Route::get('login', [ 'as' => 'login','uses' => 'User\LoginController@index']);
Route::get('logout', [ 'as' => 'logout', 'uses' => 'User\LoginController@logout']);
//future routes
Route::get('jobListings', function () {return view('jobListings');});
Route::get('Blog', function () {return view('Blog');});
//profile module routes
Route::get('/editprofile', function() { return view('editprofile');});
Route::post('/doeditprofile', 'ProfileController@update');
Route::get('/profile', function () {return view('profile');})->middleware('auth');
Route::get('/viewsjobs', 'NavigationController@showJobs')->middleware('auth');
Route::get('/search', 'NavigationController@showSearch')->name('search');
Route::get('/groups/{id}', 'NavigationController@showGroupActions')->name('group.actions');
Route::post('/group/join', 'GroupController@joinGroup')->name('group.join');
Route::post('/group/leave', 'GroupController@leaveGroup')->name('group.leave');
Route::get('/viewgroups', 'NavigationController@showGroups')->middleware('auth');
Route::get('/applyjobs', 'NavigationController@showJobs')->middleware('auth'); 
Route::get('/jobs/{id}', 'NavigationController@showJobActions')->name('job.actions');
Route::post('/job/apply', 'JobController@applyJob')->name('job.apply');

Route::get('/jobsearch', function() {return view('job.jobsearch');});
Route::post('/jobsearch/search', 'JobController@searchForJob')->name('job.search');

Route::resource('/usersrest', 'UsersRestController') ;
Route::resource('/jobsrest', 'JobsRestController');
Route::get('/testapi', 'RestClientController@index');
Route::get('/logout', 'LoginController@logout');
Route::get('/loggingservice', 'TestLoggingController@index');








//admin routes
Auth::routes();
// create for redirect to admin panel using middleware (we have changes in AdminMiddleware,kernel,LoginController files //here auth and admin indicate to folder)
Route::group(['middleware' => ['auth','admin']],
    function () {
        
        Route::get('/dashboard', function () { return view('admin.dashboard'); });  });
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/userlist', function () {return view('admin.register-edit');});
Route::get('/adminpanel', 'NavigationController@index');
Route::get('/joblist', 'NavigationController@showJobAdmin');
Route::get('/jobpost', function()  {return view('admin.jobpost');});
Route::get('/jobedit', function()  {return view('admin.jobedit');});
Route::get('/admin/jobs/edit', 'NavigationController@showJobUpdate')->name('admin.job.edit');
Route::post('/admin/delete', 'AdminController@showDelete');
Route::post('/admin/suspend', 'AdminController@showSuspend');
Route::post('/admin/reactivate', 'AdminController@showReactivate');
Route::post('admin/jobupdate', 'JobController@updateJob')->name('admin.job.update');
Route::post('/admin/deletepost', 'JobController@deleteJob');
Route::post('/admin/group/add', 'GroupController@addGroup')->name('group.add');
Route::post('admin/groupupdate', 'GroupController@updateGroup')->name('admin.group.update');
Route::post('/admin/deletegroup', 'GroupController@deleteGroup');
Route::post('/admin/job/add', 'JobController@addJob')->name('job.add');
Route::get('/grouplist', 'NavigationController@showGroupAdmin');
Route::get('/grouppost', function()  {return view('admin.grouppost');});
Route::get('/groupedit', function()  {return view('admin.groupedit');});
Route::get('/admin/groups/edit', 'NavigationController@showGroupUpdate')->name('admin.group.edit');





