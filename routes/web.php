<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\ClientController;
use \Illuminate\Support\Facades\Http;
use Ramsey\Uuid\Builder\FallbackBuilder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//get, post, patch, delete,options

Route::get('/', function () {
    return view('indexparty');
})->name('home');;

Route::resource('/client', ClientController::class);
Route::resource('/party', PartyController::class);


// Route::fallback(function () {
//     return redirect()->route('home');
// });
