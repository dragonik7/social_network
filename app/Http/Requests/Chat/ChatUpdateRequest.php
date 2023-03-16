<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;

class ChatUpdateRequest extends FormRequest
{

	public function rules(): array
	{
		return [

		];
	}

	public function authorize(): bool
	{
		return true;
	}
}