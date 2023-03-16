<?php

namespace App\Http\Controllers;

use App\Events\MessageSentEvent;
use App\Http\Requests\Message\MessageCreateRequest;
use App\Http\Requests\Message\MessageUpdateRequest;
use App\Http\Resources\Message\MessageResource;
use App\Models\Chat;
use App\Models\Message;
use App\Repositories\Interface\FileInterface;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

	protected FileInterface $file;

	public function __construct(FileInterface $file)
	{
		$this->file = $file;
	}

	public function store(MessageCreateRequest $createRequest, Chat $chat)
	{
		$messageData = $createRequest->all();
		if ($createRequest->hasFile('files')) {
			$messageData['files'] = $this->file->saveFiles($messageData['files'], 'messages_file');
		}
		$message = $chat->messages()->create($messageData);
		broadcast((new MessageSentEvent($message, Auth::user()))->dontBroadcastToCurrentUser());
		return MessageResource::make($message);
	}

	public function update(Chat $chat, Message $message, MessageUpdateRequest $updateRequest)
	{
		$messageData = $updateRequest->all();
		if ($updateRequest->hasFile('files')) {
			$messageData['files'] = $this->file->updateFiles($messageData['files'], $message->files, 'messages_file');
		}
		$message->update($messageData);
		broadcast((new MessageSentEvent($message, Auth::user()))->dontBroadcastToCurrentUser());
		return MessageResource::make($messageData);
	}

	public function delete(Chat $chat, Message $message)
	{
		$message->delete();
		broadcast((new MessageSentEvent($message, Auth::user()))->dontBroadcastToCurrentUser());
		return MessageResource::make($message);
	}
}