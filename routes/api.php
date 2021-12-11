<?php

use App\Http\Controllers\API\V0\AddController;
use App\Http\Controllers\API\V0\ReceiveController;
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

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v0/test')
    ->group(function () {
            Route::any('demands/add', AddController::class);
            Route::any('demands/{demand}', ReceiveController::class);
    });
