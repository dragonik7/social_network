<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		User::factory(1)->create([
			'name'     => 'Shami',
			'email'    => 'qwerty@gmail.com',
			'password' => 'fdsafr23r981',
		]);
		User::factory(10)
			->has(Post::factory(), 'posts')
			->create();
	}
}
