<?php

namespace App\Listeners;

class CategoryDetachDemands
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
		// make demands category null
		$category->demands()->update(['category_id' => null]);
	}
}
