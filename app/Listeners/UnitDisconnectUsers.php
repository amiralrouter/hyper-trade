<?php

namespace App\Listeners;

class UnitDisconnectUsers
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
		$unit = $event->unit;

		$unit->order_users()->detach();
		$unit->demand_users()->detach();
	}
}
