<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageCreateRequest extends FormRequest
{

	public function rules(): array
	{
		return [
			'text'             => ['string', 'max:2048'],
			'files.*'          => ['file', 'max:4096'],
			'messageable_type' => ['string'],
			'messageable_id'   => ['integer'],
		];
	}

	public function authorize(): bool
	{
		return true;
	}
}