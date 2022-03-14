<?php

namespace App\Listeners;

use App\Models\Wallet;

class UnitCreateWallet
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
		$unit = $event->unit;

		$wallet = new Wallet();
		$wallet->business_id = $unit->business_id;
		$wallet->unit_id = $unit->id;
		$wallet->save();

		$unit->wallet_id = $wallet->id;
		$unit->save();
	}
}
