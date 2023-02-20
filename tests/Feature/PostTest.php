<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostTest extends TestCase
{
	use DatabaseMigrations;
	protected User $user;
	protected array $images;
	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create();
		for ($iterableImage = 0; $iterableImage < random_int(1,3); $iterableImage++){
			$this->images[] = UploadedFile::fake()->image('photo.jpg');
		}
	}

	public function testListPosts()
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
	public function testCreatePost(){
		Storage::fake('public');
		$response = $this->actingAs($this->user)->post(route('posts.create'),[
			'text' => fake()->sentence(),
			'images' => $this->images,
		]);
		$response->assertStatus(201);
		Storage::disk('public')->assertExists('postPhoto/' . $this->images[0]->hashname());
	}
	public function testUpdatePost(){
		$post = Post::factory()->create();
		$response = $this->actingAs($this->user)->patch(route('posts.update', $post->id), [
			'text' => fake()->sentence(),
			'images' => $this->images
		]);
		$response->assertStatus(201);
		Storage::disk('public')->assertExists('postPhoto/' . $this->images[0]->hashname());
	}
	public function testDeletePost(){
		$post = Post::factory()->create();
		$response = $this->actingAs($this->user)->delete(route('posts.delete', $post->id));
		$response->assertStatus(204);
	}
}