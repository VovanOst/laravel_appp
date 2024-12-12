<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test',['name' => 'Vladimir Ostrovskiy']);
});

Route::get('/page', function () {
    return view('page');
});




Route::get('/user/{id}', [UserController::class, 'show']);


///Route::get('/page')
