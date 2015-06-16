<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



 Route::get('/', array('as' => 'home', 'uses'=>'FrontController@index'));


Route::group(['middleware' => ['sentry','hasAccess'],'hasAccess'=>'bedrijf'], function() {

 Route::resource('/bedrijven','BedrijfController');

});

Route::group(['middleware' => ['sentry','hasAccess'],'hasAccess'=>'tools'], function() {

 Route::resource('/tools','ToolsController');

});
