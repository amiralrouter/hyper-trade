<?php

namespace App\Listeners;

use App\Events\UserDeleting;

class DeleteUserTelegram
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
	public function handle(UserDeleting $event): void
	{
		$event->user->telegram->delete();
	}
}
