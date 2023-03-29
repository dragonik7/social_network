<?php

namespace Database\Factories;

use App\Models\Chat;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChatFactory extends Factory
{

	protected $model = Chat::class;

	public function definition(): array
	{
		return [
			'name'       => $this->faker->sentence(),
			'images'     => null,
			'faculty_id' => Faculty::query()->get()->random()->id,
			'user_id'    => User::query()->get()->random()->id,
		];
	}
}
