<?php

namespace App\Http\Controllers;

use App\Events\MessageSentEvent;
use App\Http\Requests\MessageCreateRequest;
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
		return Message::query()->where('id', Auth::id())->get();
	}

	public function store(MessageCreateRequest $createRequest)
	{
		$messageData = $createRequest->all();
		if ($createRequest->hasFile('files')) {
			$messageData['files'] = $this->file->saveFiles($messageData['files'], 'messages_file');
		}
		$message = Auth::user()->sender_messages()->create($messageData);
		broadcast((new MessageSentEvent($message))->dontBroadcastToCurrentUser());
		return $message;
	}

	public function show(Message $message)
	{
	}

	public function update(Request $request, Message $message)
	{
	}

	public function destroy(Message $message)
	{
	}
}