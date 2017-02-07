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
//     return view('welcome');
// });
// Route::get('/', 'PageController@getHome');

// Route::get('about', function() {
// 	return view('about');
// });
// Route::get('about', 'PageController@getAbout');

// Route::get('contact', function() {
// 	return view('contact');
// });
// Route::get('contact', 'PageController@getContact');

// we want to manage a resource for menage the posts controller
// so we can use ALL the routes provided into post controller
// Route::resource('posts', 'PostController');

# just foro regroup
# Auth instructions. The equivalent is Auth::routes()
Route::get('auth/login', 'Auth\LoginController@showLoginForm');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', 'Auth\LoginController@logout');

Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');

Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[a-zA-Z0-9\_\-]+');
Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);

Route::get('about', 'PageController@getAbout');
Route::get('contact', 'PageController@getContact');
Route::get('/', 'PageController@getHome');

Route::resource('posts', 'PostController');
