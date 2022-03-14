<?php

namespace App\Listeners;

class CategoryDerelictProducts
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
		$category = $event->category;
		// flush category products
		$category->products()->detach();
	}
}
