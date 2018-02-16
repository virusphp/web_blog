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
//
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/suggests','SuggestController')->middleware('auth');


  //jika memiliki 1 url yang sama kita menggunakan prefix lebih fleksible ,
  //mempersingkat url folder ex folder blom memiliki banyak cabang
Route::prefix('blog')->group(function(){
  //home
  Route::get('/','BlogController@home')->name('index')->middleware('auth');
  Route::get('/all','BlogController@all')->middleware('auth');
  //create
  Route::get('/create','BlogController@create')->middleware('auth');
  Route::post('/','BlogController@store')->name('store')->middleware('auth');

  //nampilin per id
  Route::get('/{id}','BlogController@show');

  //route buat update
  Route::get('/{id}/edit','BlogController@edit')->name('edit')->middleware('auth');
  Route::put('/{id}','BlogController@update')->middleware('auth');

  //route buat deleted
  Route::delete('/blog/{id}','BlogController@destroy')->middleware('auth');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
