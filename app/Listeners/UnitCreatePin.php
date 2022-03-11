<?php

namespace App\Listeners;

use App\Events\UnitReset;

class UnitCreatePin
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
	public function handle(UnitReset $event): void
	{
		$event->unit->pin = random_int(100000, 999999);
		$event->unit->save();
	}
}
