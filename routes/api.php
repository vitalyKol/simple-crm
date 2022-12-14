<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user = $request->user();
    return $user->tokens();
});
Route::apiResource('clients', \App\Http\Controllers\Api\ClientController::class)->middleware('auth:sanctum');

Route::get('tokens', function(Request $request){
    $user = $request->user();
    dd($user);
    $tokens = [];
    foreach ($user->tokens as $token) {
        $tokens[] = $token;
    }
    return json_encode($tokens);
});
