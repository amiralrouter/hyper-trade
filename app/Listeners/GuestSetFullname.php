<?php

namespace App\Listeners;

class GuestSetFullname
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
		// set guest fullname with faker. use spesific language
		$language = $event->guest->language;

		$faker = \Faker\Factory::create($language->locale);

		$this->guest->fullname = $faker->name;
		$this->guest->save();
	}
}
