<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\AuthController;

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

Route::post('login', [AuthController::class, 'customLogin']);
Route::post('register', [AuthController::class, 'customRegistration']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    Route::resource('user', UserController::class);
    Route::resource('employee', EmployeeController::class);

    Route::post('/logout', [AuthController::class, 'signOut']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
