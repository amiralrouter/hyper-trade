<?php

namespace App\Observers;

use App\Models\Business;
use App\Models\Guest;
use App\Models\Language;

class GuestObserver
{
	public function creating(Guest $guest): void
	{
		$business = Business::find($guest->business_id);
		$language = Language::find($business->language_id);

		$guest->language_id = $business->language_id;

		$faker = \Faker\Factory::create($language->locale);
		$guest->fullname = $faker->name;
	}

	public function created(Guest $guest): void
	{
	}

	public function updating(Guest $guest): void
	{
	}

	public function updated(Guest $guest): void
	{
	}

	public function saving(Guest $guest): void
	{
	}

	public function saved(Guest $guest): void
	{
	}

	public function deleting(Guest $guest): void
	{
	}

	public function deleted(Guest $guest): void
	{
	}

	public function restoring(Guest $guest): void
	{
	}

	public function restored(Guest $guest): void
	{
	}

	public function forceDeleted(Guest $guest): void
	{
	}
}
