<?php

namespace App\Events;

use App\Models\Floor;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class FloorDeleting
{
	use Dispatchable;
	use InteractsWithSockets;
	use SerializesModels;

	public Floor $floor;

	/**
	 * Create a new event instance.
	 */
	public function __construct(Floor $floor)
	{
		$this->floor = $floor;
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
