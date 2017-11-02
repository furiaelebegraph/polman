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

Route::get('/', 'WelcomeController@welcome')->name('inicio');

Route::group(['prefix' => 'adminis'], function(){
	Auth::routes();
});

Route::group(['middleware'=> 'auth'],function(){
  Route::resource('categoria','cateController', ['only' => ['create', 'store', 'index', 'edit']]);
  Route::post('categoria/{id}/update','cateController@update');
  Route::get('categoria/{id}/delete','cateController@destroy');
  Route::get('categoria/{id}/deleteMsg','cateController@DeleteMsg');
});

Route::group(['middleware'=> 'auth'],function(){
  Route::resource('subcategoria','subCateController', ['only' => ['create', 'store', 'index', 'edit']]);
  Route::post('subcategoria/{id}/update','subCateController@update');
  Route::get('subcategoria/{id}/delete','subCateController@destroy');
  Route::get('subcategoria/{id}/deleteMsg','subCateController@DeleteMsg');
});

Route::group(['middleware'=> 'auth'],function(){
  Route::resource('producto','produController', ['only' => ['create', 'store', 'index', 'edit']]);
  Route::post('producto/{id}/update','produController@update');
  Route::get('producto/{id}/delete','produController@destroy');
  Route::get('producto/{id}/deleteMsg','produController@DeleteMsg');
});

Route::group(['middleware'=> 'auth'],function(){
  Route::resource('imagen','imaController', ['only' => ['store', 'index', 'edit']]);
  Route::post('imagen/cargarGale', 'imaController@cargarGaleria');
  Route::get('imagen/create/{id}', 'imaController@create');
  Route::post('imagen/{id}/update','imaController@update');
  Route::get('imagen/{id}/delete','imaController@destroy');
  Route::get('imagen/{id}/deleteMsg','imaController@DeleteMsg');
});

Route::post('enviar_correo', 'WelcomeController@enviarCorreo');

Route::get('/ajaxSucate/{id}', 'ProduController@ajaxSucate');

Route::get('/ajaxProdu/{id}', 'ProduController@ajaxProdu');

Route::get('/ajaxIma/{id}', 'ProduController@ajaxIma');

Route::get('producto/{id}', 'ProduController@show');

Route::get('subcategoria/{id}', 'subCateController@show');

Route::get('categoria/{id}', 'CateController@show');

Route::get('detalle/{id}', 'ProduController@detalle')->name('producto.detalle');

Route::get('/home', 'HomeController@index')->name('home');

