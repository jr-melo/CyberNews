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

Route::resource('/', 'MainPageController');
Route::resource('/posts', 'MainPageController');
Route::resource('/categories', 'CategoriesPageController');
Route::resource('/categories/news', 'CategoriesPageController');


Auth::routes();



/* Route::get('/home', 'HomeController@index')->name('home'); */

Route::get('/admin', 'AdminController@index')->name('admin');

/* Route::get('/admin', function () {
    return view('admin.dashboard');

})->name('admin'); */

Route::group(['middleware' => ['auth']], function () {
    
    Route::resource('/admin/users', 'UsersController');
    Route::resource('/admin/roles', 'RolesController');
    Route::resource('/admin/permissions', 'PermissionsController');
    Route::resource('/admin/news', 'NewsController');
    Route::resource('/admin/category', 'CategorysController');
    Route::patch('/admin/category/{id}/edit/deleteImage', 'CategorysController@update');
    
});
  

/* Route::get('/categories', function () {
    return view('/pages/categories');
}); */

Route::get('/about', function () {
    return view('/pages/about');
});

Route::get('/contact', function () {
    return view('/pages/contact');
});
