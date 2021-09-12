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
Auth::routes();

Route::get('/', 'FrontendController@getData', function ()  {
    return view('welcome');
});

Route::resource('/users'     , 'FrontendController');
Route::get('/all-albums', 'FrontendController@getAllalbums');
Route::get('/all-photos/{slug}', 'FrontendController@getAllphotos');




Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/albums'  , 'AlbumsController');
Route::resource('/gallery' , 'AlbumsController');
Route::resource('/photos'  , 'PhotosController');
Route::resource('/profile' , 'ProfilesController');

});