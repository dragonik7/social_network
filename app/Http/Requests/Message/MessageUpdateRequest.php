<?php

namespace App\Http\Requests\Message;

use App\Http\Requests\BaseApiRequest;

class MessageUpdateRequest extends BaseApiRequest
{

	public function rules(): array
	{
		return [
			'text'    => ['string', 'max:2048'],
			'files.*' => ['file', 'max:4096'],
		];
	}

	public function authorize(): bool
	{
		return true;
	}
}