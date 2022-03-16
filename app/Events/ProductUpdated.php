<?php

namespace App\Events;

use App\Models\Product;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class ProductUpdated
{
	use Dispatchable;
	use InteractsWithSockets;
	use SerializesModels;

	public Product $product;

	/**
	 * Create a new event instance.
	 */
	public function __construct(Product $product)
	{
		$this->product = $product;
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
