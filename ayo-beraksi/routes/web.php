<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/', 'Web\AuthController@redirect')->name('index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'Web\AuthController@home')->name('dashboard');
    Route::get('/logout', 'Web\AuthController@logout')->name('logout');
    //route test fcm
    Route::get('/test-fcm', 'Web\AuthController@fcmTest')->name('fcmTest');

    // Route::get('/push-notificaiton', 'Actions\PushNotificationController@')->name('push-notificaiton');
    Route::post('/save-token', 'Actions\PushNotificationController@saveToken')->name('save-token');
    Route::post('/send-notification', 'Actions\PushNotificationController@sendPushNotification')->name('send.notification');

    // Group Laporan
    Route::group(['prefix' => 'laporan/', 'as' => 'laporan.'], function () {
        Route::resource('penyuapan', 'Web\LaporanPenyuapanController');
        Route::resource('pengaduan', 'Web\LaporanPengaduanController');
        Route::resource('gratifikasi', 'Web\LaporanGratifikasiController');
    });

    // Group Analisis Laporan
    Route::group(['prefix' => 'analisis/', 'as' => 'analisisLaporan.'], function () {
        Route::resource('penyuapan', 'Web\AnalisisLaporanPenyuapanController');
        Route::resource('gratifikasi', 'Web\AnalisisLaporanGratifikasiController');
        Route::get('penyuapan-monitor', 'Web\AnalisisLaporanPenyuapanController@monitorPelaporan')->name('penyuapan.view');
        Route::get('penyuapan-monitor/{id}', 'Web\AnalisisLaporanPenyuapanController@showMonitorPelaporan')->name('penyuapan.showMonitor');
        Route::get('gratifikasi-monitor', 'Web\AnalisisLaporanGratifikasiController@monitorPelaporan')->name('gratifikasi.view');
        Route::get('gratifikasi-monitor/{id}', 'Web\AnalisisLaporanGratifikasiController@showMonitorPelaporan')->name('gratifikasi.showMonitor');
    });

    // Klasifikasi Laporan Pengaduan
    Route::group(['prefix' => 'klasifikasi/', 'as' => 'klasifikasi.'], function () {
        Route::resource('pengaduan', 'Web\KlasifikasiLaporanPengaduanController');
        Route::get('pengaduan-monitor', 'Web\KlasifikasiLaporanPengaduanController@monitorPelaporan')->name('pengaduan.view');
        Route::get('pengaduan-monitor/{id}', 'Web\KlasifikasiLaporanPengaduanController@showMonitorPelaporan')->name('pengaduan.showMonitorPelaporan');
    });

    // Group Logbook
    Route::group(['prefix' => 'logbook/', 'as' => 'logbook.'], function () {
        Route::resource('gratifikasi', 'Web\LogbookLaporanGratifikasiController');
        Route::resource('penyuapan', 'Web\LogbookLaporanPenyuapanController');
        Route::get('gratifikasi-monitor', 'Web\LogbookLaporanGratifikasiController@monitorPelaporan')->name('gratifikasi.view');
        Route::get('gratifikasi-monitor/{id}', 'Web\LogbookLaporanGratifikasiController@showMonitorPelaporan')->name('gratifikasi.showMonitorPelaporan');
        Route::get('penyuapan-monitor', 'Web\LogbookLaporanPenyuapanController@monitorPelaporan')->name('penyuapan.view');
        Route::get('penyuapan-monitor/{id}', 'Web\LogbookLaporanPenyuapanController@showMonitorPelaporan')->name('penyuapan.showMonitorPelaporan');
    });

    // Feedback
    Route::resource('/feedback', 'Web\FeedbackController');

    // Role
    Route::resource('/role', 'Web\RoleController');


    Route::group(['prefix' => 'actions/', 'as' => 'actions.'], function () {
        Route::group(['middleware' => ['permission:akses penyuapan']], function () {
            require('actions/laporan-penyuapan.php');
        });
        Route::group(['middleware' => ['permission:akses pengaduan']], function () {
            require('actions/laporan-pengaduan.php');
        });
        Route::group(['middleware' => ['permission:akses gratifikasi']], function () {
            require('actions/laporan-gratifikasi.php');
        });
        Route::group(['middleware' => ['permission:akses feedback']], function () {
            require('actions/feedback.php');
        });

        //role
        Route::group(['middleware' => ['permission:akses role']], function () {
            require('actions/role.php');
        });
    });
});
