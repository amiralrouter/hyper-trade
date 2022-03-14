<?php

namespace App\Listeners;

class ProductDemenu
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
		// product demenu
		$product = $event->product;
		// remove all many to many categories relations
		$product->menus()->detach();
	}
}
