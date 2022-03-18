<?php

namespace App\Observers;

use App\Models\User;
use App\Models\UserTelegram;

class UserObserver
{
	public function creating(User $user): void
	{
	}

	public function created(User $user): void
	{
		UserTelegram::create([
			'user_id' => $user->id,
		]);
		$user->syncUnits();
	}

	public function updating(User $user): void
	{
	}

	public function updated(User $user): void
	{
		$user->syncUnits();
	}

	public function saving(User $user): void
	{
	}

	public function saved(User $user): void
	{
	}

	public function deleting(User $user): void
	{
		// delete user telegram
		$user->telegram()->delete();

		// detach all departments
		$user->departments()->detach();

		// detach all units
		$user->order_units()->detach();
		$user->petition_units()->detach();
	}

	public function deleted(User $user): void
	{
	}

	public function restoring(User $user): void
	{
	}

	public function restored(User $user): void
	{
	}

	public function forceDeleted(User $user): void
	{
	}
}
