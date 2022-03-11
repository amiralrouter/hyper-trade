<?php

namespace App\Events;

use App\Models\Printer;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PrinterCreated
{
	use Dispatchable;
	use InteractsWithSockets;
	use SerializesModels;

	public Printer $printer;

	/**
	 * Create a new event instance.
	 */
	public function __construct(Printer $printer)
	{
		$this->printer = $printer;
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
