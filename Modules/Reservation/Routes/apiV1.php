<?php

use Illuminate\Http\Request;
use Modules\Paiement\Http\Controllers\Api\V1\{ PaiementController, FonctionController, AgentController };


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

// Route::middleware('auth:api')->get('/reservation', function (Request $request) {
//     return $request->user();
// });

Route::group(['as' => 'reservation::api.', 'prefix' => 'reservation'], function () {

    Route::controller(FonctionController::class)->group(function () {
        Route::get('/fonction', 'index')->name('fonction.index');
        Route::post('/fonction', 'store')->name('fonction.store');
        Route::get('/fonction/{id}', 'edit')->name('fonction.edit');
        Route::put('/fonction/{id}', 'update')->name('fonction.update');
        Route::delete('/fonction/{id}', 'destroy')->name('fonction.destroy');
    });

    Route::controller(AgentController::class)->group(function () {
        Route::get('/agent', 'index')->name('agent.index');
        Route::post('/agent', 'store')->name('agent.store');
        Route::get('/agent/{id}', 'edit')->name('agent.edit');
        Route::put('/agent/{id}', 'update')->name('agent.update');
        Route::delete('/agent/{id}', 'destroy')->name('agent.destroy');
    });

    Route::controller(PaiementController::class)->group(function () {
        Route::get('/paiement', 'index')->name('paiement.index');
        Route::post('/paiement', 'store')->name('paiement.store');
        Route::get('/paiement/{id}', 'edit')->name('paiement.edit');
        Route::put('/paiement/{id}', 'update')->name('paiement.update');
        Route::delete('/paiement/{id}', 'destroy')->name('paiement.destroy');
    });

});