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

// Route::get('/', function () {
//     return view('user/home');
// });


Auth::routes();


Route::group(['namespace'=>'user'], function(){

Route::get('/user/blog/{post?}', 'postController@post')->name('post');
Route::get('/user/category/{category?}', 'HomeController@category')->name('category');
Route::get('/user/tag/{tag?}', 'HomeController@tag')->name('tag');
Route::get('/', 'HomeController@index');
});


//admin controllers
Route::Group(['namespace' => 'admin'], function()
{
	
Route::get('admin/home', 'HomeController@index')->name('admin.index');
Route::resource('admin/post', 'PostController');
Route::resource('admin/category', 'CategoryController');
Route::resource('admin/tag', 'TagController');
Route::resource('admin/user','AdminController');
Route::resource('admin/role','RoleController');
Route::resource('admin/permission','PermissionController');

Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin-login', 'Auth\LoginController@login');	
});



