<?php

namespace App\Http\Services;

use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\RegisterUserRequest;
use App\Models\User;
use App\Repositories\Interface\FileInterface;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;

class UserService
{

	protected FileInterface $file;

	public function __construct(FileInterface $file)
	{
		$this->file = $file;
	}

	public function register(RegisterUserRequest $request)
	{
		$data = $request->toArray();
		if ($request->hasFile('avatar')) {
			$data['avatar'] = $this->file->saveFile($data['avatar'], 'avatar');
		}
		$user = User::create($data);
		if ($user) {
			event(new Registered($user));
			$user->token = $user->createToken(
				name     : $request->ip() . "|" . $request->userAgent(),
				expiresAt: Carbon::parse(Carbon::now()->add('3month'))
			)->plainTextToken;
			return $user;
		}
		throw new \HttpResponseException(response('', 500));
	}

	public function login(LoginUserRequest $request)
	{
		$user = User::withTrashed()->firstWhere('email', '=', $request->email);
		if (!$user || !Hash::check($request->password, $user->password)) {
			throw new HttpResponseException(
				response()->json(['Password or email incorrect'], 400),
			);
		}
		return $user->createToken(
			name     : $request->ip() . "|" . $request->userAgent(),
			expiresAt: Carbon::parse(Carbon::now()->add('3month'))
		);

	}
}