<?php

Route::post('role/add', 'Actions\RoleController@store')->name('role.store');
Route::get('role/get-list', 'Actions\RoleController@getList')->name('role.list');
Route::get('role/show/{id}', 'Actions\RoleController@show')->name('role.show');
Route::put('role/update/{id}', 'Actions\RoleController@update')->name('role.update');
Route::delete('role/delete/{id}', 'Actions\RoleController@destroy')->name('role.destroy');
