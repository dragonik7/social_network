<?php

namespace App\Http\Requests\Post;

use App\Http\Requests\BaseApiRequest;

class PostUpdateRequest extends BaseApiRequest
{

	public function rules(): array
	{
		return [
			'text'     => ['string', 'max:2048'],
			'images.*' => ['image', 'max:4096'],
		];
	}

	public function authorize(): bool
	{
		return true;
	}
}