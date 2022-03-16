<?php

namespace App\Listeners;

class ProductDetachCategories
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
		// product decagorize
		$product = $event->product;
		// remove all many to many categories relations
		$product->categories()->detach();
	}
}
