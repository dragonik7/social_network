<?php

namespace App\Models;

use App\Notifications\User\SendVerifyWithQueueNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{

	use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasUuids;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
		'phone_number',
		'avatar',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function avatar(): Attribute
	{
		return Attribute::make(
			get: fn($value) => (str_starts_with($value,
					'http') or is_null($value)) ? $value : url('storage/', $value),
			set: fn($value) => $value,
		);
	}

	public function password(): Attribute
	{
		return Attribute::make(
			get: fn($value) => $value,
			set: fn($value) => Hash::make($value),
		);
	}

	public function sendEmailVerificationNotification()
	{
		$this->notify(new SendVerifyWithQueueNotification());
	}

	public function posts(): HasMany
	{
		return $this->hasMany(Post::class, 'user_id', 'id');
	}

	public function sender_messages(): HasMany
	{
		return $this->hasMany(Message::class, 'from_user_id', 'id');
	}

	public function recipient_messages(): HasMany
	{
		return $this->hasMany(Message::class, 'to_user_id', 'id');
	}
}
