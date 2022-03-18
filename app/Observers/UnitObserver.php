<?php

namespace App\Observers;

use App\Models\Unit;
use App\Models\Block;
use App\Models\Floor;

class UnitObserver
{
	public function creating(Unit $unit): void
	{
		$unit->resetPin();
	}

	public function created(Unit $unit): void
	{
		$unit->createWallet();
		$unit->syncUsers();
		$unit->syncMenus();
		$unit->syncProducts();
	}

	public function updating(Unit $unit): void
	{
	}

	public function updated(Unit $unit): void
	{
		$unit->syncUsers();
		$unit->syncMenus();
		$unit->syncProducts();
	}

	public function saving(Unit $unit): void
	{
		$floor_id = $unit->floor_id;
		$floor = Floor::find($floor_id);

		if ($floor) {
			$block_id = $floor->block_id;
			$block = Block::find($block_id);

			if ($block) {
				$unit->block_id = $block_id;
			}
		}
	}

	public function saved(Unit $unit): void
	{
	}

	public function deleting(Unit $unit): void
	{
		$wallets = $unit->wallets;
		if ($wallets) {
			foreach ($wallets as $wallet) {
				$wallet->delete();
			}
		}

		$unit->order_users()->detach();
		$unit->petition_users()->detach();

		$unit->menus()->detach();

		$unit->products()->detach();
	}

	public function deleted(Unit $unit): void
	{
	}

	public function restoring(Unit $unit): void
	{
	}

	public function restored(Unit $unit): void
	{
	}

	public function forceDeleted(Unit $unit): void
	{
	}
}
