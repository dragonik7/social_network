<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ChatTest extends TestCase
{

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create();
		for ($iterableImage = 0; $iterableImage < random_int(1, 3); $iterableImage++) {
			$this->images[] = UploadedFile::fake()->image('photo.jpg');
		}
	}

	/** @test */
	public function testBasic()
	{
		$response = $this->get('/');

		$response->assertStatus(200);
	}
}