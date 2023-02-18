<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Controller;
use App\Http\Controllers\PartyController;

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

Route::middleware('auth:sanctum')->get(
    '/user',
    function (Request $request) {
        return $request->user();
    }
);

Route::post('contact', [Controller::class,'whatsapp']);
Route::get('contact/{number}', [Controller::class,'send']);
Route::get('dateslocation', [Controller::class,'dates']);
Route::get('getInfos',[PartyController::class,'getInfos']);
Route::get('denied/{id}',[PartyController::class,'denied']);
Route::get('permited/{id}',[PartyController::class,'permited']);
Route::get('session',[Controller::class,'sessionWhatsApp']);