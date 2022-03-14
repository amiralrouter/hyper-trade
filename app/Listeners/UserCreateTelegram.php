<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Models\UserTelegram;

class UserCreateTelegram
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
	public function handle(UserCreated $event): void
	{
		$user_telegram = new UserTelegram();
		$user_telegram->user_id = $event->user->id;
		$user_telegram->chat_id = 0;
		$user_telegram->save();
	}
}
