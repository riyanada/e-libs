<?php

use Illuminate\Support\Facades\Auth;
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
//     Route::get('/', 'HomeController@index')->name('home');
// });
Auth::routes();

// Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
//     Route::get('/', 'HomeController@user')->name('home');
// });

Route::group([
    'middleware' => ['auth'],
    'prefix' => '/'
], function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
});

//anggota
Route::group([
    'middleware' => ['auth', 'checkrole:1'],
    'prefix' => 'users'
], function () {
    Route::get('/', 'UsersController@index')->name('users.index');
    Route::get('/create', 'UsersController@create')->name('users.create');
    Route::post('/', 'UsersController@store')->name('users.store');
    Route::get('/{user_id}', 'UsersController@show')->name('users.show');
    Route::get('/{user_id}/edit', 'UsersController@edit')->name('users.edit');
    Route::put('/{user_id}', 'UsersController@update')->name('users.update');
    Route::delete('/{user_id}', 'UsersController@destroy')->name('users.delete');
});

//role
Route::group([
    'middleware' => ['auth', 'checkrole:1'],
    'prefix' => 'role'
], function () {
    Route::get('/', 'RoleController@index')->name('role.index');
    Route::get('/create', 'RoleController@create')->name('role.create');
    Route::post('/', 'RoleController@store')->name('role.store');
    Route::get('/{role_id}', 'RoleController@show')->name('role.show');
    Route::get('/{role_id}/edit', 'RoleController@edit')->name('role.edit');
    Route::put('/{role_id}', 'RoleController@update')->name('role.update');
    Route::delete('/{role_id}', 'RoleController@destroy')->name('role.delete');
});


//enrole
Route::group([
    'middleware' => ['auth', 'checkrole:1'],
    'prefix' => 'enrolments'
], function () {
    Route::get('/', 'EnrolmentController@index')->name('enrolments.index');
    Route::get('/create', 'EnrolmentController@create')->name('enrolments.create');
    Route::post('/', 'EnrolmentController@store')->name('enrolments.store');
    Route::get('/{role_id}', 'EnrolmentController@show')->name('enrolments.show');
    Route::get('/{role_id}/edit', 'EnrolmentController@edit')->name('enrolments.edit');
    Route::put('/{role_id}', 'EnrolmentController@update')->name('enrolments.update');
    Route::delete('/{role_id}', 'EnrolmentController@destroy')->name('enrolments.delete');
});


// Books
Route::group([
    'middleware' => ['auth', 'checkrole:1'],
    'prefix' => 'books'
], function () {
    Route::get('/', 'BookController@index')->name('books.index');
    Route::get('/create', 'BookController@create')->name('books.create');
    Route::get('/{book_id}', 'BookController@show')->name('books.show');
    Route::post('/', 'BookController@store')->name('books.store');
    Route::get('/{book_id}/edit', 'BookController@edit')->name('books.edit');
    Route::put('/{book_id}', 'BookController@update')->name('books.update');
    Route::delete('/{book_id}', 'BookController@destroy')->name('books.delete');
});

// Books Anggota
Route::group([
    'middleware' => ['auth', 'checkrole:1,2'],
    'prefix' => 'books'
], function () {
    Route::get('/', 'BookController@index')->name('books.index');
    Route::get('/{book_id}', 'BookController@show')->name('books.show');
});

// category
Route::group([
    'middleware' => ['auth', 'checkrole:1'],
    'prefix' => 'categories'
], function () {
    Route::get('/', 'CategoryController@index')->name('categories.index');
    Route::post('/', 'CategoryController@store')->name('categories.store');
    Route::get('/{category_id}', 'CategoryController@show')->name('categories.show');
    Route::get('/{category_id}/edit', 'CategoryController@edit')->name('categories.edit');
    Route::put('/{category_id}', 'CategoryController@update')->name('categories.update');
    Route::delete('/{category_id}', 'CategoryController@destroy')->name('categories.delete');
});

// BookHistory
Route::group([
    'middleware' => ['auth', 'checkrole:1,2'],
    'prefix' => 'book_history'
], function () {
    Route::get('/', 'BookHistoryController@index')->name('book_history.index');
});
