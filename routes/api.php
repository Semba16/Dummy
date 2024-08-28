<?php

use App\Http\Controllers\ApiPublic\AuthController;
use App\Http\Controllers\ApiPublic\V4\ProfileController;
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

Route::group(['middleware' => 'auth:api', ], function () {
  Route::group(['prefix' => 'v4', 'as' => 'gitlab_v4.'], function () {
    Route::get('user', [ProfileController::class, 'user'])->name('user');
  });
});
// https://dlabs.id/oauth/authorize?response_type=code&client_id=Qwerty&redirect_uri=https%3A%2F%2Foffice.dlabs.id%2Fsignup%2Fgitlab%2Fcomplete&state=eyJhY3Rpb24iOiJsb2dpbiIsImlzTW9iaWxlIjoiZmFsc2UiLCJ0b2tlbiI6ImE2bndlYXRxbnoxbTZ1OXM3NnJoN284Z3FxNm82ZDdidzV6NW5hanI0enVkaHNmNzl3N296NXB4NTF6Y3JjNzQifQ%3D%3D

Route::group([
  'middleware' => 'api',
  'prefix' => 'oauth'
], function ($router) {
  // Route::post('authorize', 'AuthController@login');

  // Route::post('logout', 'AuthController@logout');
  // Route::post('refresh', 'AuthController@refresh');

  // Route::post('v3/user', 'AuthController@me');
  // Route::post('v4/user', 'AuthController@me');
});
