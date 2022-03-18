<?php

namespace App\Observers;

use App\Models\Menu;

class MenuObserver
{
	public function creating(Menu $menu): void
	{
	}

	public function created(Menu $menu): void
	{
	}

	public function updating(Menu $menu): void
	{
	}

	public function updated(Menu $menu): void
	{
	}

	public function saving(Menu $menu): void
	{
	}

	public function saved(Menu $menu): void
	{
	}

	public function deleting(Menu $menu): void
	{
		$menu->products()->detach();
		$menu->units()->detach();
	}

	public function deleted(Menu $menu): void
	{
	}

	public function restoring(Menu $menu): void
	{
	}

	public function restored(Menu $menu): void
	{
	}

	public function forceDeleted(Menu $menu): void
	{
	}
}
