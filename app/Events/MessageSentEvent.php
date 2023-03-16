<?php

namespace App\Events;

use App\Http\Resources\Message\MessageResource;
use App\Models\Message;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSentEvent implements ShouldBroadcast
{

	use Dispatchable, InteractsWithSockets, SerializesModels;

	private Message $message;
	private User    $user;

	/**
	 * @param  Message  $message
	 * @param  User  $user
	 */
	public function __construct(Message $message, User $user)
	{
		$this->message = $message;
		$this->user = $user;
	}

	public function broadcastOn(): Channel
	{
		return new Channel('chat' . $this->user->id);
	}

	public function broadcastWith(): array
	{
		return [new MessageResource($this->message)];
	}
}