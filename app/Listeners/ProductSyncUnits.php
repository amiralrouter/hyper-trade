<?php

namespace App\Listeners;

class ProductSyncUnits
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
		$menus = $event->product->menus()->get();
		$unit_ids = [];
		foreach ($menus as $menu) {
			$menu_units = $menu->units()->get();
			foreach ($menu_units as $unit) {
				$unit_ids[] = $unit->id;
			}
		}
		$event->product->units()->sync($unit_ids);
	}
}
