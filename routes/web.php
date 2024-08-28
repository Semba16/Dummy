<?php

use App\Http\Controllers\Authenticated\DashboardController;
use App\Http\Controllers\Authenticated\Employee\EmployeeController;
use App\Http\Controllers\Authenticated\Accounting\AccountingController;
use App\Http\Controllers\Authenticated\HR\RecruitmentController;
use App\Http\Controllers\Authenticated\Integration\OAuthController;
use App\Http\Controllers\Public\Auth\AuthController;
use Illuminate\Support\Facades\Route;

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

// Public
Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
  Route::resource('login', AuthController::class)->only(['index', 'store'])->middleware('guest');
  Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});

// Public oAuth
// Route::group(['prefix' => 'oauth', 'as' => 'oauth.'], function () {
//   Route::resource('authorize', AuthorizeController::class);
//   // Route::get('login', 'MainController@home')->name('login');
// });

// Private Access / Authenticated
Route::middleware('auth')->group(function () {
  Route::resource('/', DashboardController::class);
  Route::resource('accounting', AccountingController::class);
  Route::resource('employee', EmployeeController::class);

  // Human Resource Route
  Route::group(['prefix' => 'hr', 'as' => 'hr.'], function () {
    Route::resource('recruitment', RecruitmentController::class);
    Route::resource('recruitment/archive', EmployeeController::class);
    Route::resource('recruitment-selection', EmployeeController::class);
    Route::resource('recruitment-test', EmployeeController::class);
    Route::resource('recruitment-assessment', EmployeeController::class);
    Route::resource('recruitment-archive', EmployeeController::class);
  });

  Route::group(['prefix' => 'integration', 'as' => 'integration.'], function () {
    Route::resource('oauth2', OAuthController::class);
  });
});
