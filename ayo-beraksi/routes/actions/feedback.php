<?php

Route::get('feedback/get-list', 'Actions\FeedbackController@getList')->name('feedback.list');
Route::get('feedback/show/{id}', 'Actions\FeedbackController@show')->name('feedback.show');
Route::put('feedback/update/{id}', 'Actions\FeedbackController@update')->name('feedback.update');
Route::delete('feedback/delete/{id}', 'Actions\FeedbackController@destroy')->name('feedback.destroy');
