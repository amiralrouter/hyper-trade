<?php

namespace App\Listeners;

use App\Models\Wallet;

class UnitDropWallet
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

		$wallet = Wallet::where('unit_id', $unit->id)->first();
		$wallet->is_active = false;
		$wallet->save();
	}
}
