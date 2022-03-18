<?php

namespace App\Observers;

use App\Models\Block;

class BlockObserver
{
	public function creating(Block $block): void
	{
	}

	public function created(Block $block): void
	{
	}

	public function updating(Block $block): void
	{
	}

	public function updated(Block $block): void
	{
	}

	public function saving(Block $block): void
	{
	}

	public function saved(Block $block): void
	{
	}

	public function deleting(Block $block): void
	{
		echo 'block deleting' . PHP_EOL;
		$floors = $block->floors;
		foreach ($floors as $floor) {
			$floor->delete();
		}
	}

	public function deleted(Block $block): void
	{
	}

	public function restoring(Block $block): void
	{
	}

	public function restored(Block $block): void
	{
	}

	public function forceDeleted(Block $block): void
	{
	}
}
