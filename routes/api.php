<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return ['message' => 'That\'s ok!'];
})->middleware('auth:api');
