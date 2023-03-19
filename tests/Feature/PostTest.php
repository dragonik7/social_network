<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostTest extends TestCase
{

	use RefreshDatabase;

	protected User  $user;
	protected array $images;

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create();
		for ($iterableImage = 0; $iterableImage < random_int(1, 3); $iterableImage++) {
			$this->images[] = UploadedFile::fake()->image('photo.jpg');
		}
	}

	/** @test */
	public function get_list_posts()
	{
		$this->artisan('db:seed');
		$response = $this->get(route('posts.list'));
		$response->assertStatus(200)->assertJsonStructure([
			'data' => [
				'*' => [
					'id',
					'text',
					'images',
					'user',
				],
			],
		]);
	}

	/** @test */
	public function create_post()
	{
		Storage::fake('public');
		$dataCreatePost = [
			'text'   => fake()->sentence(),
			'images' => $this->images,
		];
		$response = $this->actingAs($this->user)->post(route('posts.create'), $dataCreatePost);
		$response->assertStatus(201);
		$fileName = strstr(json_decode($response->content())->data->images[0], Carbon::now('D')->format('y.m.d'));
		Storage::disk('public')->assertExists('post_photo/' . $fileName);
	}

	/** @test */
	public function update_post()
	{
		$post = Post::factory()->create();
		$response = $this->actingAs($this->user)->post(route('posts.update', $post->id), [
			'text'   => fake()->sentence(),
			'images' => $this->images,
		]);
		$response->assertStatus(201);
		$date = Carbon::now('D')->format('y.m.d');
		$fileName = strstr(json_decode($response->content())->data->images[0], $date);
		Storage::disk('public')->assertExists('post_photo/' . $fileName);
	}

	/** @test */
	public function delete_post()
	{
		$post = Post::factory()->create();
		$response = $this->actingAs($this->user)->delete(route('posts.delete', $post->id));
		$response->assertStatus(204);
	}
}