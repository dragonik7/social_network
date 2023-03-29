<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{

	public function run(): void
	{
		$faculty = [
			'Бизнес-информатика', 'Прикладная информатика', 'Информационная безопасность', 'Юриспруденция',
			'Строительство', 'Экономика',
			'Лингвистика',
			'Торговое дело',
			'Менеджмент',
			'Землеустройство и кадастры',
		];
		foreach ($faculty as $item) {
			Faculty::create(['title' => $item]);
		}
	}
}
