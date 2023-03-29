<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Chat;
use App\Models\Message;
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
		$this->call(FacultySeeder::class);
		User::factory(1)->create([
			'name'     => 'Shami',
			'email'    => 'Shamil79797@gmail.com',
			'password' => 'fdsafr23r981',
		]);
		User::factory(10)
			->has(Post::factory(), 'posts')
			->create();
		Chat::factory(40)->create();
		$this->call(ChatUserSeeder::class);
		Message::factory(30)->create();
	}
}
