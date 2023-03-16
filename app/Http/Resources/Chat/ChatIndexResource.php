<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Chat */
class ChatIndexResource extends JsonResource
{

	public function toArray($request)
	{
		return [
			'id'         => $this->id,
			'name'       => $this->name,
			'images'     => $this->images,
			'created_at' => $this->created_at,
			'updated_at' => (bool) $this->updated_at,
		];
	}
}
