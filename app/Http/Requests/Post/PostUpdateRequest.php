<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{

	public function rules(): array
	{
		return [
			'text' => ['string', 'max:2048'],
			'images.*' => ['image', 'max:4096'],
			'images' => ['array']
		];
	}

	public function authorize(): bool
	{
		return true;
	}
}