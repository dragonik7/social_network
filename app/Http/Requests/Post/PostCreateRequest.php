<?php

namespace App\Http\Requests\Post;

use App\Http\Requests\BaseApiRequest;
use Illuminate\Support\Facades\Storage;

class PostCreateRequest extends BaseApiRequest
{

	public function rules(): array
	{
		return [
			'text' => ['string', 'max:2048'],
			'images.*' => ['image', 'max:4096'],
		];
	}

	public function authorize(): bool
	{
		return true;
	}

	protected function passedValidation()
	{
		$this->merge([
			'user_id' => auth()->id()
		]);
	}
}