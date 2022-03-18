<?php

namespace App\Observers;

use App\Models\Printer;

class PrinterObserver
{
	public function creating(Printer $printer): void
	{
		$printer->reset_uuid();
	}

	public function created(Printer $printer): void
	{
	}

	public function updating(Printer $printer): void
	{
	}

	public function updated(Printer $printer): void
	{
	}

	public function saving(Printer $printer): void
	{
	}

	public function saved(Printer $printer): void
	{
	}

	public function deleting(Printer $printer): void
	{
	}

	public function deleted(Printer $printer): void
	{
	}

	public function restoring(Printer $printer): void
	{
	}

	public function restored(Printer $printer): void
	{
	}

	public function forceDeleted(Printer $printer): void
	{
	}
}
