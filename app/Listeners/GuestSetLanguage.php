<?php

namespace App\Listeners;

class GuestSetLanguage
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
		// set language from guest's business
		$event->guest->language_id = $event->guest->buesiness->language_id;
		$event->guest->save();
	}
}
