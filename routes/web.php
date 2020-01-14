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

Route::get('/','HomeController@index');

Route::middleware(['auth'])->prefix('my')->group(function(){
    Route::get('account','UserController@index')->name('my.account');
    Route::post('account','UserController@edit')->name('my.account.edit');
    Route::get('fav','UserController@edit')->name('my.account.favs');
    Route::get('event','UserController@edit')->name('my.account.events');
    Route::get('ticket','UserController@ticket')->name('my.account.tickets');
});

Route::get('category/{slug}','EventController@category')->name('event.category');
Route::get('organizer/{slug}','EventController@organizer')->name('event.organizer');
Route::get('place/{slug}','EventController@place')->name('event.place');
Route::get('event/{slug}','EventController@show')->name('event.show');

Route::middleware(['auth'])->prefix('yonetim')->group(function(){
    Route::get('/','Admin\HomeController@index')->name('admin.home');
    Route::resource('/user','Admin\UserController');
    Route::resource('/organizer','Admin\OrganizerController');
});

Route::get('dummy','HomeController@dummy');
Auth::routes();
