<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseApiRequest;
use Illuminate\Support\Facades\Hash;

class RegisterUserRequest extends BaseApiRequest
{

	public function rules(): array
	{
		return [
			'name'         => ['string', 'max:255', 'required'],
			'email'        => ['unique:users,email', 'max:255', 'required'],
			'phone_number' => ['string', 'max:15', 'nullable'],
			'avatar'       => ['image', 'max:1024', 'nullable'],
			'password'     => ['string', 'min:4', 'max:255', 'required', 'confirmed'],
		];
	}
}