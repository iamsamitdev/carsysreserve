<?php

use Illuminate\Http\Request;

Route::post('register','API\RegisterController@register');

Route::middleware('auth:api')->group(function(){
    Route::resource('events','API\EventAPIController');
});
