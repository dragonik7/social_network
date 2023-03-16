<?php

namespace App\Http\Requests\Chat;

use App\Http\Requests\BaseApiRequest;

class ChatCreateRequest extends BaseApiRequest
{

	public function rules(): array
	{
		return [
			'text'     => ['string', 'max:2048'],
			'images.*' => ['image', 'max:4096'],
			'user_id'  => ['exists:users,id'],
		];
	}

	public function authorize(): bool
	{
		return true;
	}
}