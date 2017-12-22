<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/20/2017
 * Time: 7:17 PM
 */


Route::get('index', 'WebScrapperController@getIndex');

Route::group(['middleware' => ['web']], function (){

});