<?php

namespace App\Listeners;

class UserDisconnectUnits
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
		$user = $event->unit;

		$user->order_units()->detach();
		$user->demand_units()->detach();
	}
}
