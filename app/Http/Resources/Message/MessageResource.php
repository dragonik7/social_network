<?php

namespace App\Http\Resources\Message;

use App\Http\Resources\User\ShortInfoUserResource;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Message */
class MessageResource extends JsonResource
{

	public function toArray($request)
	{
		return [
			'id'         => $this->id,
			'text'       => $this->text,
			'files'      => $this->files,
			'creator'    => ShortInfoUserResource::make($this->creator()),
			'chat_id'    => $this->chat_id,
			'created_at' => $this->created_at,
			'updated_at' => (bool) $this->updated_at,
			'is_deleted' => (bool) $this->deleted_at,
		];
	}
}
