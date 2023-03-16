<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

	protected $model = Post::class;

	public function definition(): array
	{
		$images = [];
		for ($countImages = 0; $countImages < random_int(1, 3); $countImages++) {
			$images[] = fake()->imageUrl();
		}
		return [
			'text'    => fake()->sentence(10),
			'images'  => $images,
			'user_id' => User::query()->get()->random()->id,
		];
	}
}
