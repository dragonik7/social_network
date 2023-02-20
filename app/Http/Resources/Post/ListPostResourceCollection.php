<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\User\ShortInfoUserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @see \App\Models\Post */
class ListPostResourceCollection extends JsonResource
{

	/**
	 * @param  Request  $request
	 * @return array
	 */
	public function toArray($request)
	{
		return [
			'id' => $this->id,
			'text' => $this->text,
			'images' => $this->images,
			'user' => ShortInfoUserResource::make($this->user),
			'created_at' => $this->created_at
		];
	}
}
