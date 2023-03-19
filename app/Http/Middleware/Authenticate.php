<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{

	/**
	 * Get the path the user should be redirected to when they are not authenticated.
	 *
	 * @param  Request  $request
	 * @return string|null
	 */
	protected function redirectTo($request): ?string
	{
		throw new HttpResponseException(
			response()->json(['Unauthorized'], 401),
		);
	}
}
