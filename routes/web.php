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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/u/read/news/notification', 'NewsController@notifRead')->name('notif.read');

Route::get('/u/news', 'NewsController@index')->name('allNews');
Route::get('/u/news/add', 'NewsController@add')->name('news.add');
Route::post('/u/news/store', 'NewsController@store')->name('news.store');
Route::get('/u/news/edit/{id}', 'NewsController@edit')->name('news.edit');
Route::post('/u/news/update/{id}', 'NewsController@update')->name('news.update');
Route::delete('/u/news/delete/{id}', 'NewsController@delete')->name('news.delete');
