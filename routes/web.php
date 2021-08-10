<?php

use Illuminate\Support\Facades\Route;

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


// frontend 
Route::get('/', 'FrontendController@home')->name('mainpage');
Route::get('onlinecourse', 'FrontendController@onlinecourse')->name('onlinecoursepage');
Route::get('contact', 'FrontendController@contact')->name('contactpage');
Route::post('contact', 'FrontendController@contactSubmit')->name('contact.Submit');

Route::get('signin', 'FrontendController@signin')->name('signinpage');
Route::get('signup', 'FrontendController@signup')->name('signuppage');
Route::get('profile', 'FrontendController@profile')->name('profilepage');
Route::get('aboutus', 'FrontendController@aboutus')->name('aboutuspage');
Route::get('coursedetail/{id}', 'FrontendController@coursedetail')->name('coursedetail');

Route::get('coursebycategory/{id}', 'FrontendController@coursebycategory')->name('coursebycategory');

Route::resource('register', 'RegisterController');
Route::post('confirm/{id}', 'RegisterController@confirm')->name('register.confirm');
//ajax
Route::post('bycategory', 'FrontendController@bycategory')->name('bycategory');

Route::get('grade1/{id}', 'FrontendController@grade1')->name('grade1');
Route::get('grade2/{id}', 'FrontendController@grade2')->name('grade2');
Route::get('grade3/{id}', 'FrontendController@grade3')->name('grade3');
Route::get('grade4/{id}', 'FrontendController@grade4')->name('grade4');
Route::get('grade5/{id}', 'FrontendController@grade5')->name('grade5');
Route::get('grade6/{id}', 'FrontendController@grade6')->name('grade6');
Route::get('grade7/{id}', 'FrontendController@grade7')->name('grade7');
Route::get('grade8/{id}', 'FrontendController@grade8')->name('grade8');
Route::get('grade9/{id}', 'FrontendController@grade9')->name('grade9');

Route::get('recommend', 'FrontendController@recommend')->name('recommend');
// Route::get('registerdetail', 'FrontendController@registerdetail')->name('registerdetail');

Route::resource('recommendation', 'RecommendationController');
Route::resource('user', 'UserController');

Route::middleware(['role:admin'])->group(function () {
//backend
Route::resource('category', 'CategoryController'); // 7 {get, post, put, delete}
Route::resource('course', 'CourseController'); // 7 {get, post, put, delete}
Route::resource('photo', 'PhotoController');

});

Route::get('/home', 'HomeController@index')->name('home');


// Auth
Auth::routes(['register'=>false]);
