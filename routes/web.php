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


Route::get('/', '\App\Http\Controller\WebScrapperController@index');

Route::post('edit/{id}', '\App\Http\Controller\WebScrapperController@update');
Route::get('edit/{id}', '\App\Http\Controller\WebScrapperController@edit');
Route::get('delete/{id}', '\App\Http\Controller\WebScrapperController@delete');
Route::get('collect_rss', '\App\Http\Controller\WebScrapperController@collect_rss');



