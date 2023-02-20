<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostCreateRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Http\Resources\Post\ListPostResourceCollection;
use App\Http\Resources\Post\PostShowResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

	public function getList()
	{
		$posts = Post::query()->paginate(10);
		return ListPostResourceCollection::collection($posts);

	}

	public function store(PostCreateRequest $createRequest)
	{
		$postData = $createRequest->all();
		foreach ($postData['images'] as $key => $image){
			$postData['images'][$key] = Storage::disk('public')->put('postPhoto', $image);
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
		if (!is_null($updateRequest['images'])) {
			foreach ($updateRequest->images as $key => $image) {
				$filePath = Storage::disk('public')->put('postPhoto', $image);

				$data['images'][$key] = $filePath;
			}
			Storage::disk('public')->delete(array_diff($updateRequest->images, $data['images']));
			$data['images'] = json_encode($data['images']);
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