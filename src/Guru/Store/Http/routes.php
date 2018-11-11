<?php

// Admin web routes  for store
Route::group(['prefix' => trans_setlocale().'/admin/store'], function () {
    Route::resource('store', 'Guru\Store\Http\Controllers\StoreAdminWebController');
});

// Admin API routes  for store
Route::group(['prefix' => trans_setlocale().'api/v1/admin/store'], function () {
    Route::resource('store', 'Guru\Store\Http\Controllers\StoreAdminApiController');
});

// User web routes for store
Route::group(['prefix' => trans_setlocale().'/user/store'], function () {
    Route::resource('store', 'Guru\Store\Http\Controllers\StoreUserWebController');
});

// User API routes for store
Route::group(['prefix' => trans_setlocale().'api/v1/user/store'], function () {
    Route::resource('store', 'Guru\Store\Http\Controllers\StoreUserApiController');
});

// Public web routes for store
Route::group(['prefix' => trans_setlocale().'/stores'], function () {
    Route::get('/', 'Guru\Store\Http\Controllers\StorePublicWebController@index');
    Route::get('/{slug?}', 'Guru\Store\Http\Controllers\StorePublicWebController@show');
});

// Public API routes for store
Route::group(['prefix' => trans_setlocale().'api/v1/stores'], function () {
    Route::get('/', 'Guru\Store\Http\Controllers\StorePublicApiController@index');
    Route::get('/{slug?}', 'Guru\Store\Http\Controllers\StorePublicApiController@show');
});

