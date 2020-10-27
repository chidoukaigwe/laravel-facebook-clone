<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//  All Routes In This Callback Is Protected By The Auth API
Route::middleware('auth:api')->group(function () {

    Route::get('auth-user',  'AuthUserController@show');

    Route::apiResources([
        '/posts' => 'PostController',
        '/users' => 'UserController',
        '/users/{user}/posts' => 'UserPostController',
    ]);

});
