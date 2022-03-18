<?php

namespace App\Observers;

use App\Models\Floor;

class FloorObserver
{
	public function creating(Floor $floor): void
	{
	}

	public function created(Floor $floor): void
	{
	}

	public function updating(Floor $floor): void
	{
	}

	public function updated(Floor $floor): void
	{
	}

	public function saving(Floor $floor): void
	{
	}

	public function saved(Floor $floor): void
	{
	}

	public function deleting(Floor $floor): void
	{
		foreach ($floor->units as $unit) {
			$unit->block_id = null;
			$unit->floor_id = null;
			$unit->save();
		}
	}

	public function deleted(Floor $floor): void
	{
	}

	public function restoring(Floor $floor): void
	{
	}

	public function restored(Floor $floor): void
	{
	}

	public function forceDeleted(Floor $floor): void
	{
	}
}
