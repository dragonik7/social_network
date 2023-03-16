<?php

namespace App\Http\Resources\Chat;

use App\Http\Resources\Message\MessageResource;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Chat */
class ChatShowResource extends JsonResource
{

	public function toArray($request)
	{
		return [
			'id'         => $this->id,
			'name'       => $this->name,
			'images'     => $this->images,
			'messages'   => MessageResource::collection($this->messages()->get()),
			'users'      => $this->users(),
			'created_at' => $this->created_at,
			'updated_at' => (bool) $this->updated_at,
		];
	}
}
