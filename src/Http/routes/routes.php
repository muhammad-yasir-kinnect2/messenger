<?php
/**
 * Created by   :  Muhammad Yasir
 * Project Name : packeges
 * Product Name : PhpStorm
 * Date         : 22-Apr-16 11:44 AM
 * File Name    : routes.php
 */
Route::group(['namespace' => 'Pasha\Messenger\Http\Controllers', 'prefix' => 'messenger'], function () {
    Route::get('/', ['as' => 'messenger', 'uses' => 'MessengerController@index']);
    Route::get('create', ['as' => 'messenger.create', 'uses' => 'MessengerController@create']);
    Route::post('/', ['as' => 'messenger.store', 'uses' => 'MessengerController@store']);
    Route::get('{id}', ['as' => 'messenger.show', 'uses' => 'MessengerController@show']);
    Route::put('{id}', ['as' => 'messenger.update', 'uses' => 'MessengerController@update']);
});
