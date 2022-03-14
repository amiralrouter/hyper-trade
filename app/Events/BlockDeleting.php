<?php

namespace App\Events;

use App\Models\Block;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class BlockDeleting
{
	use Dispatchable;
	use InteractsWithSockets;
	use SerializesModels;

	public Block $block;

	/**
	 * Create a new event instance.
	 */
	public function __construct(Block $block)
	{
		$this->block = $block;
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
