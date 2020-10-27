<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//  All Routes In This Callback Is Protected By The Auth API
Route::middleware('auth:api')->group(function () {

    Route::apiResources([
        'posts' => 'PostController',
        'users' => 'UserController'
    ]);

});
