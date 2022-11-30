<?php

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->namespace('App\Http\Controllers\Api')->group(function(){
    Route::name('produto')->group(function(){

        Route::resource('produto','ProdutoController');
    });
});

