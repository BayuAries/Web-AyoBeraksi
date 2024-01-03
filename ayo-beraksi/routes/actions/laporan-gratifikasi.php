<?php

Route::post('laporan-gratifikasi/add', 'Actions\LaporanGratifikasiController@store')->name('gratifikasi.store');
Route::get('laporan-gratifikasi/get-list', 'Actions\LaporanGratifikasiController@getList')->name('gratifikasi.list');
Route::get('laporan-gratifikasi/show/{id}', 'Actions\LaporanGratifikasiController@show')->name('gratifikasi.show');
Route::put('laporan-gratifikasi/update/{id}', 'Actions\LaporanGratifikasiController@update')->name('gratifikasi.update');
Route::delete('laporan-gratifikasi/delete/{id}', 'Actions\LaporanGratifikasiController@destroy')->name('gratifikasi.destroy');
Route::put('laporan-gratifikasi/update-status/{id}', 'Actions\LaporanGratifikasiController@updateStatus')->name('gratifikasi.updateStatus');

//get list penugasan analisis
Route::get('laporan-gratifikasi/get-list-penugasan', 'Actions\LaporanGratifikasiController@getListPenugasan')->name('gratifikasi.list-tugas');

//analisis gratifikasi
Route::post('analisis/laporan-gratifikasi/add', 'Actions\AnalisisLaporanGratifikasiController@store')->name('analisis.gratifikasi.store');
Route::get('analisis/laporan-gratifikasi/get-list', 'Actions\AnalisisLaporanGratifikasiController@getList')->name('analisis.gratifikasi.list');
Route::get('analisis/laporan-gratifikasi/show/{id}', 'Actions\AnalisisLaporanGratifikasiController@show')->name('analisis.gratifikasi.show');
Route::put('analisis/laporan-gratifikasi/update/{id}', 'Actions\AnalisisLaporanGratifikasiController@update')->name('analisis.gratifikasi.update');
Route::delete('analisis/laporan-gratifikasi/delete/{id}', 'Actions\AnalisisLaporanGratifikasiController@destroy')->name('analisis.gratifikasi.destroy');

// LogBook Laporan Gratifikasi
Route::post('laporan-gratifikasi/logbook/add', 'Actions\LogbookLaporanGratifikasiController@store')->name('logbook.gratifikasi.store');
Route::get('laporan-gratifikasi/logbook/get-list', 'Actions\LogbookLaporanGratifikasiController@getList')->name('logbook.gratifikasi.list');
Route::get('laporan-gratifikasi/logbook/show/{id}', 'Actions\LogbookLaporanGratifikasiController@show')->name('logbook.gratifikasi.show');
Route::put('laporan-gratifikasi/logbook/update/{id}', 'Actions\LogbookLaporanGratifikasiController@update')->name('logbook.gratifikasi.update');
Route::delete('laporan-gratifikasi/logbook/delete/{id}', 'Actions\LogbookLaporanGratifikasiController@destroy')->name('logbook.gratifikasi.destroy');

//get list penugasan logbook
Route::get('laporan-gratifikasi/get-list-logbook', 'Actions\LaporanGratifikasiController@getListLogbookTugas')->name('logbook.gratifikasi.list-tugas');
