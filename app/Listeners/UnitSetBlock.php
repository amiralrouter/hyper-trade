<?php

namespace App\Listeners;

class UnitSetBlock
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
		// unit set block_id from unit's floor's block_id
		if (null !== $event->unit->floor) {
			$event->unit->block_id = $event->unit->floor->block_id;
			$event->unit->save();
		}
	}
}
