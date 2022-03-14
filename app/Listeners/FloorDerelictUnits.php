<?php

namespace App\Listeners;

class FloorDerelictUnits
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
		$floor = $event->floor;
		$units = $floor->units;
		foreach ($units as $unit) {
			$unit->block_id = null;
			$unit->floor_id = null;
			$unit->save();
		}
	}
}
