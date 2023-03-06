<?php

namespace App\Events;

use App\Http\Resources\Message\MessageSentResource;
use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSentEvent implements ShouldBroadcast
{

	use Dispatchable, InteractsWithSockets, SerializesModels;

	private Message $message;

	/**
	 * @param  Message  $message
	 */
	public function __construct(Message $message)
	{
		$this->message = $message;
	}

	public function broadcastOn(): Channel
	{
		return new Channel('chat');
	}

	public function broadcastWith(): array
	{
		return [new MessageSentResource($this->message)];
	}
}