<?php

namespace App\Listeners;

use Illuminate\Support\Str;

class PrinterCreateUuid
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
		$event->printer->uuid = Str::uuid();
		$event->printer->save();
	}
}
