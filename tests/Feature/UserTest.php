<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\User\SendVerifyWithQueueNotification;
use Carbon\Carbon;
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

	/** @test */
	public function registration_user()
	{
		$file = UploadedFile::fake()->image('avatar.jpg');
		$response = $this->post(route('user.register'), [
			'name'                  => fake()->name,
			'email'                 => fake()->email,
			'phone_number'          => '+74575823423',
			'avatar'                => $file,
			'password'              => 'password',
			'password_confirmation' => 'password',
		]);
		$date = Carbon::now('D')->format('y.m.d');
		$fileName = strstr(json_decode($response->content())->data->avatar, $date);
		Storage::disk('public')->assertExists('avatar/' . $fileName);
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

	/** @test */
	public function email_verify()
	{
		$notification = new SendVerifyWithQueueNotification();
		$user = User::factory()->create(['email_verified_at' => null]);
		$this->assertFalse($user->hasVerifiedEmail());

		$mail = $notification->toMail($user);
		$url = $mail->actionUrl;

		$this->actingAs($user)->get($url);

		$this->assertTrue(User::find($user->id)->hasVerifiedEmail());
	}

	/** @test */
	public function login_user()
	{
		$response = $this->post(route('user.login'),
			['email' => $this->user->email, 'password' => 'password']);
		$response->assertJsonStructure([
			'data' => [
				'token',
				'expiredAt',
			],
		]);
	}

	/** @test */
	public function get_all_token_user()
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

	/** @test */
	public function delete_token_user()
	{
		$token = $this->user->createToken('qwer');
		$response = $this->delete(route('user.delete-token', ['id' => $token->accessToken->id]), [],
			['Authorization' => 'Bearer ' . $token->plainTextToken]);
		$this->assertDatabaseMissing('personal_access_tokens', [
			'id' => $token->accessToken->getKey(),
		]);
	}
}