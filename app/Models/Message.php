<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{

	use SoftDeletes, HasUuids, HasFactory;

	protected $fillable = ['text', 'files', 'user_id'];

	public function creator(): BelongsTo
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}

	public function chat(): BelongsTo
	{
		return $this->belongsTo(Chat::class, 'chat_id', 'id');
	}
}