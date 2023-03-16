<?php

namespace App\Http\Controllers;

use App\Http\Requests\Chat\ChatCreateRequest;
use App\Http\Resources\Chat\ChatIndexResource;
use App\Http\Resources\Chat\ChatShowResource;
use App\Http\Resources\Message\MessageResource;
use App\Models\Chat;
use App\Models\Message;
use App\Repositories\Interface\FileInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

	protected FileInterface $file;

	public function __construct(FileInterface $file)
	{
		$this->file = $file;
	}

	public function index()
	{
		$userId = Auth::id();
		$chat = Chat::query()
			->join('chat_users', 'chats.id', 'chat_users.chat_id')
			->where('chat_users.user_id', '=', $userId)
			->select(['chats.*'])
			->get();
		return ChatIndexResource::collection($chat);
	}

	public function store(ChatCreateRequest $createRequest)
	{
		$chatData = $createRequest->all();
		if ($createRequest->hasFile('files')) {
			$chatData['images'] = $this->file->saveFiles($chatData['images'], 'chats_images');
		}
		$chat = Chat::firstOrCreate($chatData)->users()->saveMany([
			Auth::id(),
			$chatData['user_id'],
		]);
		return ChatIndexResource::make($chat);
	}

	public function show(Chat $chat)
	{
		return ChatShowResource::make($chat);
	}

	public function update(Request $request, Message $message)
	{

	}

	public function destroy(Message $message)
	{
		$message->delete();
		return MessageResource::make($message);
	}
}