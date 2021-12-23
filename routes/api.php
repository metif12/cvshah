<?php

use App\Http\Controllers\API\V0\Auth\AuthorizationController;
use App\Http\Controllers\API\V0\Auth\LoginController;
use App\Http\Controllers\API\V0\Auth\RegisterController;
use App\Http\Controllers\API\V0\Auth\VerifyController;
use App\Http\Controllers\API\V0\Demand\AddController;
use App\Http\Controllers\API\V0\Demand\ReceiveController;
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

Route::prefix('v0')
    ->group(function (){

        Route::post('login', LoginController::class);
        Route::post('register', RegisterController::class);
        Route::post('authorization/code', AuthorizationController::class);
        Route::post('verify', VerifyController::class);

        Route::middleware('auth:sanctum')
            ->group(function () {

                Route::any('/user', function (Request $request) {
                    return $request->user();
                });

                Route::post('demands/add', AddController::class);
                Route::any('demands/{demand}', ReceiveController::class);
            });
    });


