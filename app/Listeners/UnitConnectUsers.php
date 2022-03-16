<?php

namespace App\Listeners;

use App\Helpers\UnitUserSynchronizer;
use App\Models\Unit;

class UnitConnectUsers
{
	private Unit $unit;

	public function __construct()
	{
	}

	public function handle($event): void
	{
		$unit = $event->unit;
		UnitUserSynchronizer::sync($unit);
	}
}
