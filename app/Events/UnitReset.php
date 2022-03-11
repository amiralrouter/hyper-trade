<?php

namespace App\Events;

use App\Models\Unit;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class UnitReset
{
	use Dispatchable;
	use InteractsWithSockets;
	use SerializesModels;

	public Unit $unit;

	/**
	 * Create a new event instance.
	 */
	public function __construct(Unit $unit)
	{
		$this->unit = $unit;
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
