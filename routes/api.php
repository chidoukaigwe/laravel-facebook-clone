<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//  All Routes In This Callback Is Protected By The Auth API
Route::middleware('auth:api')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/posts', 'PostController@store');

});
