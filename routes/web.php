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
//home
Route::get('/', 'HomeController@index');

//categories
Route::get('categories/{category}', 'CategoryController@index');
Route::post('categories/{category}/search', 'CategoryController@filter');
Route::get('categories/{category}/product/{product}', 'CategoryController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//subscribe
Route::post('/subscribe', 'HomeController@subscribe');

//taal kiezen
//https://laravel.com/docs/5.4/localization
Route::get('language', 'HomeController@lang');

//Zoeken naar producten
Route::get('/search', 'ZoekController@index');
Route::post('/search', 'ZoekController@zoek');


//zoeken faq
Route::get('/faq', 'ZoekController@indexFaq');
Route::post('/faq', 'ZoekController@zoekFaq');

// About pagina 
Route::get('about', 'HomeController@contact');
Route::post('about/send', 'HomeController@sendContact');

//cookie
Route::get('/cookie', 'HomeController@cookie');

//enkel voor admin
Route::group(['middleware' => 'Admin'], function () 
{
	//admin dashbooard
	Route::get('/admin', 'AdminController@index');

	//Admin product page, toevoegen, verwijderen, updaten
	Route::get('/admin/products', 'AdminController@showProducts');						// tonen van alle products
	Route::get('/admin/product/create', 'AdminController@showNewProduct'); 				//naar pagina om een product aan te maken
	Route::post('/admin/product/create', 'AdminController@createProduct'); 				//product aanmaken
	Route::get('/admin/product/edit/{product}', 'AdminController@editProduct'); 		//naar pagina om aante passen
	Route::post('/admin/product/edit/{product}', 'AdminController@updateProduct'); 		//updaten van het product na het aanpassen
	Route::delete('/admin/product/delete/{product}', 'AdminController@deleteProduct'); 	//delete product

		//Admin Faq page, toevoegen, verwijderen, updaten
	Route::get('/admin/faq', 'AdminFaqController@showfaq');						//Tonen van alle faqs
	Route::get('/admin/faq/new', 'AdminFaqController@showNewFaq');				// naar pagina om een faq aan te maken
	Route::post('/admin/faq/new', 'AdminFaqController@createFaq');				//faq aanmaken
	Route::delete('/admin/faq/delete/{faq}', 'AdminFaqController@deleteFaq');	//faq verwijderen
	Route::get('/admin/faq/edit/{faq}', 'AdminFaqController@editFaq');			//naar pagina om faq aan te passen
	Route::post('/admin/faq/edit/{faq}', 'AdminFaqController@updateFaq');		// updaten van faq na het aanpassen

	//product linken aan faq
	Route::get('/admin/product/faq/edit/{product}', 'AdminFaqController@toonFaqsVoorProduct');
	Route::delete('/admin/product/faq/delete/{product}/{faqproduct}', 'AdminFaqController@verwijderenFaqVanProduct');
	Route::post('/admin/product/faq/add/{product}/{faq}', 'AdminFaqController@updateFaqVoorProduct');

});