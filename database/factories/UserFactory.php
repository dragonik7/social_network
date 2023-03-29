<?php

namespace Database\Factories;

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{

	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'name'              => fake()->name(),
			'email'             => fake()->unique()->safeEmail(),
			'avatar'            => fake()->imageUrl(),
			'phone_number'      => fake()->e164PhoneNumber(),
			'email_verified_at' => now(),
			'faculty_id'        => Faculty::query()->get()->random()->id,
			'password'          => 'password', // password
			'remember_token'    => Str::random(10),
		];
	}

	/**
	 * Indicate that the model's email address should be unverified.
	 *
	 * @return static
	 */
	public function unverified()
	{
		return $this->state(fn(array $attributes) => [
			'email_verified_at' => null,
		]);
	}
}
