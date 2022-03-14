<?php

namespace App\Listeners;

class ProductDematerialize
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
		// product dematerialize
		$product = $event->product;
		// remove all many to many categories relations
		$product->materials()->detach();
	}
}