<?php

Route::post('laporan-penyuapan/add', 'Actions\LaporanPenyuapanController@store')->name('penyuapan.store');
Route::get('laporan-penyuapan/get-list', 'Actions\LaporanPenyuapanController@getList')->name('penyuapan.list');
Route::get('laporan-penyuapan/show/{id}', 'Actions\LaporanPenyuapanController@show')->name('penyuapan.show');
Route::put('laporan-penyuapan/update/{id}', 'Actions\LaporanPenyuapanController@update')->name('penyuapan.update');
Route::delete('laporan-penyuapan/delete/{id}', 'Actions\LaporanPenyuapanController@destroy')->name('penyuapan.destroy');
Route::put('laporan-penyuapan/update-status/{id}', 'Actions\LaporanPenyuapanController@updateStatus')->name('penyuapan.updateStatus');

//get list penugasan analisis
Route::get('laporan-penyuapan/get-list-penugasan', 'Actions\LaporanPenyuapanController@getListPenugasan')->name('penyuapan.list-tugas');

//analisis penyuapan
Route::post('analisis/laporan-penyuapan/add', 'Actions\AnalisisLaporanPenyuapanController@store')->name('analisis.penyuapan.store');
Route::get('analisis/laporan-penyuapan/get-list', 'Actions\AnalisisLaporanPenyuapanController@getList')->name('analisis.penyuapan.list');
Route::get('analisis/laporan-penyuapan/show/{id}', 'Actions\AnalisisLaporanPenyuapanController@show')->name('analisis.penyuapan.show');
Route::put('analisis/laporan-penyuapan/update/{id}', 'Actions\AnalisisLaporanPenyuapanController@update')->name('analisis.penyuapan.update');
Route::delete('analisis/laporan-penyuapan/delete/{id}', 'Actions\AnalisisLaporanPenyuapanController@destroy')->name('analisis.penyuapan.destroy');

// LogBook Laporan Penyuapan
Route::post('laporan-penyuapan/logbook/add', 'Actions\LogbookLaporanPenyuapanController@store')->name('logbook.penyuapan.store');
Route::get('laporan-penyuapan/logbook/get-list', 'Actions\LogbookLaporanPenyuapanController@getList')->name('logbook.penyuapan.list');
Route::get('laporan-penyuapan/logbook/show/{id}', 'Actions\LogbookLaporanPenyuapanController@show')->name('logbook.penyuapan.show');
Route::put('laporan-penyuapan/logbook/update/{id}', 'Actions\LogbookLaporanPenyuapanController@update')->name('logbook.penyuapan.update');
Route::delete('laporan-penyuapan/logbook/delete/{id}', 'Actions\LogbookLaporanPenyuapanController@destroy')->name('logbook.penyuapan.destroy');

//get list penugasan logbook
Route::get('laporan-penyuapan/get-list-logbook', 'Actions\LogbookLaporanPenyuapanController@getListLogbookTugas')->name('logbook.penyuapan.list-tugas');
