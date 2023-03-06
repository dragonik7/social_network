<?php

namespace App\Broadcasting;

use App\Models\User;

class ChatChannel
{

	public function __construct()
	{
	}

	public function join(User $user)
	{
		return $user;
	}
}