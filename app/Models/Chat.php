<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{

	use HasUuids, HasFactory;

	protected $fillable = ['name', 'images'];

	public function users(): BelongsToMany
	{
		return $this->belongsToMany(User::class, 'chat_users', 'chat_id', 'user_id');
	}

	public function messages(): HasMany
	{
		return $this->hasMany(Message::class, 'chat_id', 'id');
	}
}