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

Route::get('/', 'HomeController@index');

Route::get('categories/{category}', 'CategoryController@index');
Route::post('categories/{category}/search', 'CategoryController@filter');
Route::get('categories/{category}/product/{product}', 'CategoryController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/subscribe', 'HomeController@subscribe');

Route::get('/admin', 'AdminController@index');
Route::get('/admin/products', 'AdminController@showProducts');						// tonen van alle products
Route::get('/admin/product/create', 'AdminController@showNewProduct'); 				//naar pagina om een product aan te maken
Route::post('/admin/product/create', 'AdminController@createProduct'); 				//product aanmaken
Route::get('/admin/product/edit/{product}', 'AdminController@editProduct'); 		//naar pagina om aante passen
Route::post('/admin/product/edit/{product}', 'AdminController@updateProduct'); 		//updaten van het product na het aanpassen
Route::delete('/admin/product/delete/{product}', 'AdminController@deleteProduct'); 	//delete product

//https://laravel.com/docs/5.4/localization
Route::get('language', 'HomeController@lang');

Route::get('/search', 'ZoekController@index');
Route::post('/search', 'ZoekController@zoek');

Route::get('/admin/faq', 'AdminFaqController@showfaq');
Route::get('/admin/faq/new', 'AdminFaqController@showNewFaq');
Route::post('/admin/faq/new', 'AdminFaqController@createFaq');