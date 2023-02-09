<?php

namespace App\Http\Resources\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin User */
class TokensUserResource extends JsonResource
{

	/**
	 * @param  Request  $request
	 * @return array
	 */

	public function toArray($request)
	{
		return [
			'name'         => $this->name,
			'abilities'    => $this->abilities,
			'last_used_at' => $this->last_used_at,
			'expires_at'   => $this->expires_at,
		];
	}
}
