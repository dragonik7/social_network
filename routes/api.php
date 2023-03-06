<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
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

Route::group(['prefix' => '/user'], function ()
{
	Route::post('/register', [UserController::class, 'register'])->name('user.register');
	Route::post('/login', [UserController::class, 'login'])->name('user.login');
	Route::group(['middleware' => 'auth:sanctum'], function ()
	{
		Route::get('/', [UserController::class, 'info']);
		Route::get('/verify/{id}/{hash}', [UserController::class, 'verify'])->name('verification.verify');
		Route::group(['prefix' => 'token'], function ()
		{
			Route::get('/all', [UserController::class, 'tokens'])->name('user.tokens');
			Route::delete('/{id}', [UserController::class, 'deleteToken'])->name('user.delete-token');
		});
	});
});
Route::group(['prefix' => '/posts'], function ()
{
	Route::get('/list', [PostsController::class, 'getList'])->name('posts.list');
	Route::get('{post}', [PostsController::class, 'show'])->name('posts.show');
	Route::group(['middleware' => 'auth:sanctum'], function ()
	{
		Route::post('/', [PostsController::class, 'store'])->name('posts.create');
		Route::post('/{post}/update', [PostsController::class, 'update'])->name('posts.update');
		Route::delete('/{post}', [PostsController::class, 'destroy'])->name('posts.delete');
	});
});
Route::group(['prefix' => '/messages', 'middleware' => 'auth:sanctum'], function ()
{
	Route::get('/', [ChatController::class, 'index'])->name('messages.index');
	Route::post('/', [ChatController::class, 'store'])->name('messages.store');
});