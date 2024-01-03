<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// User
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::post('feedback/add', 'Actions\FeedbackController@store')->name('feedback.store');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'actions/', 'as' => 'actions.'], function () {
    require('actions/feedback.php');
});

// Route::get('/unauthorized', 'UserController@unauthorized');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('logout', 'API\UserController@logout')->name('logout');
    Route::post('details', 'API\UserController@details');
    Route::post('ganti/nama', 'API\UserController@gantiNama');
    Route::post('ganti/nohp', 'API\UserController@gantiNoHP');

    Route::post('/save-token', 'Actions\PushNotificationController@saveToken')->name('save-token');
    Route::post('/send-notification', 'Actions\PushNotificationController@sendPushNotification')->name('send.notification');

    // Role
    Route::group(['prefix' => 'role/'], function () {
    });

    Route::post('permission/add', 'Actions\PermissionController@store');
    Route::get('permission/list', 'Actions\PermissionController@getList');

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
        require('actions/laporan.php');
        //role
        Route::group(['middleware' => ['permission:akses role']], function () {
            require('actions/role.php');
        });
    });
});
