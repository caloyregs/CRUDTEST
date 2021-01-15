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

Route::get('/', function () {
    return view('welcome');
});

Route::get('student','StudentController@index');
Route::post('student','StudentController@store')->name('student.store');
Route::get('student/{id}/edit', 'StudentController@edit')->name('student.edit');
Route::post('student/update', 'StudentController@update')->name('student.update');
Route::get('student/{id}/delete', 'StudentController@destroy')->name('student.delete');

Route::resource('customers','CustomerController');
//Route::get('customers','CustomerController@index')->name('customers');
Route::post('customers','CustomerController@index')->name('customers.store');
Route::get('customers/{id}/edit/','CustomerController@edit')->name('customers.edit');
Route::get('customers/{id}/delete', 'CustomerController@destroy')->name('customers.destroy');

Route::resource('orders','OrderController');
//Route::get('orders','OrderController@index')->name('orders');
Route::get('orders/create/{id}','OrderController@create')->name('orders.create');
Route::post('orders','OrderController@store')->name('orders.store');
Route::get('orders/edit/{id}','OrderController@edit')->name('orders.edit');
Route::post('orders/update','OrderController@update')->name('orders.update');
Route::get('orders/delete/{id}', 'OrderController@destroy')->name('orders.destroy');
Route::get('orders/products','OrderController@product_info')->name('product.info');;