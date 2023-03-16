<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatUserSeeder extends Seeder
{

	public function run(): void
	{
		for ($i = 0; $i < 50; $i++) {
			DB::table('chat_users')->insert([
				'id'      => fake()->uuid(),
				'user_id' => User::query()->get()->random()->id,
				'chat_id' => Chat::query()->get()->random()->id,
			]);
		}
	}
}