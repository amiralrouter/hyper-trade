<?php

namespace App\Listeners;

use App\Models\Block;
use App\Models\Floor;

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
		$unit = $event->unit;
		$floor_id = $unit->floor_id;
		$floor = Floor::find($floor_id);

		if ($floor) {
			$block_id = $floor->block_id;
			$block = Block::find($block_id);

			if ($block) {
				$unit->block_id = $block_id;
			}
		}
	}
}
