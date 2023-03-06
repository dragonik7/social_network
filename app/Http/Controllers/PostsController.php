<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostCreateRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Http\Resources\Post\PostListResourceCollection;
use App\Http\Resources\Post\PostShowResource;
use App\Models\Post;
use App\Repositories\Interface\FileInterface;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

	protected FileInterface $file;

	public function __construct(FileInterface $file)
	{
		$this->file = $file;
	}

	public function getList()
	{
		$posts = Post::query()->paginate(10);
		return PostListResourceCollection::collection($posts);

	}

	public function store(PostCreateRequest $createRequest)
	{
		$postData = $createRequest->all();
		if ($createRequest->hasFile('images')) {
			$postData['images'] = $this->file->saveFiles($postData['images'], 'post_photo');
		}
		$post = Post::create($postData);
		return PostShowResource::make($post)->response()->setStatusCode(201);
	}

	public function show(Post $post)
	{
		return PostShowResource::make($post)->response()->setStatusCode(200);
	}

	public function update(PostUpdateRequest $updateRequest, Post $post)
	{
		$data = $updateRequest->all();
		if ($updateRequest->hasFile('images')) {
			$data['images'] = $this->file->updateFiles($data['images'], $post->images, 'post_photo');
		}
		$post->update($data);
		return PostShowResource::make($post)->response()->setStatusCode(201);
	}

	public function destroy(Post $post)
	{
		Storage::disk('public')->delete($post->images);
		$post->delete();
		return response(['message' => 'Deleted'], 204);
	}
}