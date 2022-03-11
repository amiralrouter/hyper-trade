<?php

namespace App\Listeners;

use App\Models\Block;

class BusinessCreateGlobalBlock
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
		// create a block as global block
		$block = new Block();
		$block->name = 'Global';
		$block->business_id = $event->business->id;
		$block->save();
	}
}
