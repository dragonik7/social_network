<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{

	use SoftDeletes;

	protected $with     = ['user'];
	protected $fillable = ['text', 'files', 'user_id', 'messageable_id', 'messageable_type'];

	public function messageable(): MorphTo
	{
		return $this->morphTo();
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
}