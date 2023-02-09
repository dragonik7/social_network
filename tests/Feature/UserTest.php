<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UserTest extends TestCase
{

	protected User $user;

	public function testRegister()
	{
		Storage::fake('public');
		$file = UploadedFile::fake()->image('avatar.jpg');
		$response = $this->post('api/user/register', [
			'name'                  => 'Shami',
			'email'                 => 'Shamil79797@gmail.com',
			'phone_number'          => '+74575823423',
			'avatar'                => $file,
			'password'              => 'password',
			'password_confirmation' => 'password',
		]);
		$response->assertJsonStructure([
			'data' => [
				'id',
				'name',
				'email',
				'avatar',
				'phone_number',
			],
		]);
	}

	public function testLogin()
	{
		$response = $this->post('api/user/login',
			['email' => $this->user->email, 'password' => 'password', 'device' => 'test']);
		$response->assertHeader('Authorization');
	}

	public function testTokens()
	{
		Sanctum::actingAs(
			$this->user,
			['*']
		);
		$response = $this->actingAs($this->user)->get('/api/user/tokens');
		$response->assertJsonStructure(
			[
				'name',
				'abilities',
				'last_used_at',
				'expires_at',
			],
		);
	}

	protected function setUp(): void
	{
		parent::setUp();
		$this->artisan('migrate:fresh');
		$this->user = User::factory()->create();
	}

}