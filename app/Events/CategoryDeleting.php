<?php

namespace App\Events;

use App\Models\Category;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class CategoryDeleting
{
	use Dispatchable;
	use InteractsWithSockets;
	use SerializesModels;

	public Category $category;

	/**
	 * Create a new event instance.
	 */
	public function __construct(Category $category)
	{
		$this->category = $category;
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
