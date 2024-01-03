<?php

//Laporan Pengaduan
Route::post('laporan-pengaduan/add', 'Actions\LaporanPengaduanController@store')->name('pengaduan.store');
Route::get('laporan-pengaduan/get-list', 'Actions\LaporanPengaduanController@getList')->name('pengaduan.list');
Route::get('laporan-pengaduan/show/{id}', 'Actions\LaporanPengaduanController@show')->name('pengaduan.show');
Route::put('laporan-pengaduan/update/{id}', 'Actions\LaporanPengaduanController@update')->name('pengaduan.update');
Route::delete('laporan-pengaduan/delete/{id}', 'Actions\LaporanPengaduanController@destroy')->name('pengaduan.destroy');
Route::put('laporan-pengaduan/update-status/{id}', 'Actions\LaporanPengaduanController@updateStatus')->name('pengaduan.updateStatus');

//get list penugasan klasifikasi
Route::get('laporan-pengaduan/get-list-penugasan', 'Actions\LaporanPengaduanController@getListPenugasan')->name('pengaduan.list-tugas');


//Klasifikasi Pengaduan
Route::post('klasifikasi/laporan-pengaduan/add', 'Actions\KlasifikasiLaporanPengaduanController@store')->name('klasifikasi.pengaduan.store');
Route::get('klasifikasi/laporan-pengaduan/get-list', 'Actions\KlasifikasiLaporanPengaduanController@getList')->name('klasifikasi.pengaduan.list');
Route::get('klasifikasi/laporan-pengaduan/show/{id}', 'Actions\KlasifikasiLaporanPengaduanController@show')->name('klasifikasi.pengaduan.show');
Route::put('klasifikasi/laporan-pengaduan/update/{id}', 'Actions\KlasifikasiLaporanPengaduanController@update')->name('klasifikasi.pengaduan.update');
Route::delete('klasifikasi/laporan-pengaduan/delete/{id}', 'Actions\KlasifikasiLaporanPengaduanController@destroy')->name('klasifikasi.pengaduan.destroy');
// Route::get('klasifikasi/laporan-pengaduan/get-list-penugasan', 'Actions\KlasifikasiLaporanPengaduanController@getListKasifikasi')->name('klasifikasi.pengaduan.list-tugas');
