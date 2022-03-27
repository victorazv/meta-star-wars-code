<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
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

Route::get('crawler', [PeopleController::class, 'crawler'])->middleware('log.route');
Route::get('people/{person}', [PeopleController::class, 'index'])->middleware('log.route');

Route::group(['prefix' => 'sw'], function (){

    Route::get('teste', function (){
        return json_encode('Victor');
    })->middleware('log.route');

    Route::get('people/{person}', [PeopleController::class, 'index'])->middleware('log.route');
});

//Route::get('crawler', [PeopleController::class, 'crawler']);
//Route::get('people/{person}', [PeopleController::class, 'index']);//->middleware('log.route');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
