<?php

namespace App\Listeners;

use App\Models\Floor;

class BusinessCreateGlobalFloor
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
		// create a floor as global floor
		$floor = new Floor();
		$floor->name = 'Global';
		$floor->business_id = $event->business->id;
		$floor->save();
	}
}
