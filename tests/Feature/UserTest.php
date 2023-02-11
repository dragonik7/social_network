<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\User\SendVerifyWithQueueNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UserTest extends TestCase
{

	use RefreshDatabase;

	protected User $user;

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create();
		Mail::fake();
	}

	public function testRegister()
	{
		Storage::fake('public');
		$file = UploadedFile::fake()->image('avatar.jpg');
		$response = $this->post(route('user.register'), [
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

	public function testEmailVerify()
	{
		$notification = new SendVerifyWithQueueNotification();
		$user = User::factory()->create(['email_verified_at' => null]);
		$this->assertFalse($user->hasVerifiedEmail());

		$mail = $notification->toMail($user);
		$url = $mail->actionUrl;

		$this->actingAs($user)->get($url);

		$this->assertTrue(User::find($user->id)->hasVerifiedEmail());
	}

	public function testLogin()
	{
		$response = $this->post(route('user.login'),
			['email' => $this->user->email, 'password' => 'password', 'device' => 'test']);
		$response->assertHeader('Authorization');
	}

	public function testTokens()
	{
		for ($i = 0; $i < 3; $i++) {
			$this->user->createToken('qwer');
		}
		$response = $this->actingAs($this->user)->get(route('user.tokens'));
		$response->assertStatus(200)->assertJsonStructure([
			'data' => [
				'*' => [
					'name',
					'abilities',
					'last_used_at',
					'expires_at',
				],
			],
		]);
	}

	public function testDeleteToken()
	{
		$token = $this->user->createToken('qwer');
		$response = $this->delete(route('user.delete-token', ['id' => $token->accessToken->id]));
		$this->assertDatabaseMissing('personal_access_tokens', [
			'id' => $token->accessToken->getKey(),
		]);
	}
}