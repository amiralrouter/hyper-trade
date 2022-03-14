<?php

namespace App\Listeners;

class BlockDeleteFloors
{
	/**
	 * Create the event listener.
	 */
	public function __construct()
	{
	}

	/**
	 * Handle the event.
	 *
	 * @param object $event
	 */
	public function handle($event): void
	{
		$block = $event->block;
		$floors = $block->floors;
		foreach ($floors as $floor) {
			$floor->delete();
		}
	}
}
