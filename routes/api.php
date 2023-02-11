<?php

use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request)
{
	return $request->user();
})->name('user');

Route::group(['prefix' => '/user'], function ()
{
	Route::post('/register', [UserController::class, 'register'])->name('user.register');
	Route::post('/login', [UserController::class, 'login'])->name('user.login');
	Route::group(['middleware' => 'auth:sanctum'], function ()
	{
		Route::get('/verify/{id}/{hash}', [UserController::class, 'verify'])->name('verification.verify');
		Route::group(['prefix' => 'token'], function ()
		{
			Route::get('/all', [UserController::class, 'tokens'])->name('user.tokens');
			Route::delete('/{id}', [UserController::class, 'deleteToken'])->name('user.delete-token');
		});
	});
});

