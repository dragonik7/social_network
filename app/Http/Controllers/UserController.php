<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\RegisterUserRequest;
use App\Http\Resources\User\InfoUserResource;
use App\Http\Resources\User\LoginUserResource;
use App\Http\Resources\User\TokensUserResource;
use App\Http\Services\UserService;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

	public function register(RegisterUserRequest $request, UserService $service)
	{
		$user = $service->register($request);
		return InfoUserResource::make($user);
	}

	public function info()
	{
		return InfoUserResource::make(Auth::user());
	}

	public function login(LoginUserRequest $request, UserService $service)
	{
		$token = $service->login($request);
		return LoginUserResource::make($token)->response()->withCookie('Authorization', $token->plainTextToken,
			$token->accessToken->expires_at->diffInMinutes());
	}

	public function verify(EmailVerificationRequest $request)
	{
		$request->fulfill();
		return response()->json(['Success'], 200);
	}

	public function tokens()
	{
		$tokens = Auth::user()->tokens()->get();
		return TokensUserResource::collection($tokens);
	}

	public function deleteToken($id)
	{
		Auth::user()->tokens()->where('id', '=', $id)->delete();
		return response()->json(['Success'], 200);
	}
}