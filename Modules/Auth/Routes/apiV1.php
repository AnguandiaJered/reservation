<?php

use App\Models\User;
use Illuminate\Http\Request;
use Modules\Auth\Http\Controllers\Api\V1\{ LoginController, RegisterController };

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

// Route::middleware('auth:api')->get('/auth', function (Request $request) {
//     return $request->user();
// });

Route::group(['as' => 'reservation::api.', 'prefix' => 'auth'], function () {

    Route::post('login', [LoginController::class, 'login'])->name('login');

    Route::controller(RegisterController::class)->group(function () {
        Route::post('/register', 'register')->name('register');
        Route::get('/client', 'index')->name('user.liste');
        Route::get('/client/{id}', 'show')->name('show.user');
        Route::post('/client/{id}', 'update')->name('update.user');
        Route::delete('/client/{id}', 'destroy')->name('destroy.user');
    });

});