<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['throttle:10000,1']], function () {
    Route::get('/', App\Http\Controllers\Welcome::class)->name('/');

});
