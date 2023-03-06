<?php

namespace App\Http\Resources\Message;

use App\Http\Resources\User\ShortInfoUserResource;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Message */
class MessageSentResource extends JsonResource
{

	public function toArray($request)
	{
		return [
			'id'               => $this->id,
			'text'             => $this->text,
			'files'            => $this->files,
			'messageable_id'   => $this->messageable_id,
			'messageable_type' => $this->messageable_type,
			'user'             => ShortInfoUserResource::make($this->user),
			'created_at'       => $this->created_at,
		];
	}
}
