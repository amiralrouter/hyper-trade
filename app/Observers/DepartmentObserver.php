<?php

namespace App\Observers;

use App\Models\Department;

class DepartmentObserver
{
	public function creating(Department $department): void
	{
	}

	public function created(Department $department): void
	{
	}

	public function updating(Department $department): void
	{
	}

	public function updated(Department $department): void
	{
		// users sync units
		$department->users()->syncUnits();
	}

	public function saving(Department $department): void
	{
	}

	public function saved(Department $department): void
	{
	}

	public function deleting(Department $department): void
	{
		// detach all users
		$department->users()->detach();
	}

	public function deleted(Department $department): void
	{
	}

	public function restoring(Department $department): void
	{
	}

	public function restored(Department $department): void
	{
	}

	public function forceDeleted(Department $department): void
	{
	}
}
