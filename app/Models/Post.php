<?php

namespace App\Models;

use App\Casts\ImagePath;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{

	use HasFactory;

	protected $fillable = [
		'text',
		'images',
		'user_id'
	];

	protected $casts = [
		'images'     => ImagePath::class,
		'created_at' => 'custom_datetime',
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
}
