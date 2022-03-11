<?php

namespace App\Events;

use App\Models\Guest;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class GuestCreated
{
	use Dispatchable;
	use InteractsWithSockets;
	use SerializesModels;

	public Guest $guest;

	/**
	 * Create a new event instance.
	 */
	public function __construct(Guest $guest)
	{
		$this->guest = $guest;
	}

	/**
	 * Get the channels the event should broadcast on.
	 *
	 * @return array|\Illuminate\Broadcasting\Channel
	 */
	public function broadcastOn()
	{
		return new PrivateChannel('channel-name');
	}
}
