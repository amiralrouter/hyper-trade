<?php

namespace App\Providers;

use App\Events\BusinessCreated;
use App\Events\GuestCreated;
use App\Events\OrderCreated;
use App\Events\PrinterCreated;
use App\Events\UnitCreated;
use App\Events\UnitReset;
use App\Events\UnitSaved;
use App\Events\UserCreated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
	/**
	 * The event listener mappings for the application.
	 *
	 * @var array<class-string, array<int, class-string>>
	 */
	protected $listen = [
		Registered::class => [
			SendEmailVerificationNotification::class,
		],
		// USER EVENTS
		UserCreated::class => [
			\App\Listeners\CreateUserTelegram::class,
		],
		// BUSINESS EVENTS
		BusinessCreated::class => [
			\App\Listeners\BusinessCreateGlobalBlock::class,
			\App\Listeners\BusinessCreateGlobalFloor::class,
		],
		// UNIT EVENTS
		UnitCreated::class => [
			\App\Listeners\UnitCreatePin::class,
			\App\Listeners\UnitCreateWallet::class,
		],
		UnitSaved::class => [
			\App\Listeners\UnitSetBlock::class,
		],
		UnitReset::class => [
			\App\Listeners\UnitCreatePin::class,
			\App\Listeners\UnitDropWallet::class,
			\App\Listeners\UnitCreateWallet::class,
		],
		// GUEST EVENTS
		GuestCreated::class => [
			\App\Listeners\GuestSetLanguage::class,
			\App\Listeners\GuestSetFullname::class,
		],
		// PRINTER EVENTS
		PrinterCreated::class => [
			\App\Listeners\PrinterSetUuid::class,
		],
		// ORDER EVENTS
		OrderCreated::class => [
		],
	];

	/**
	 * Register any events for your application.
	 */
	public function boot(): void
	{
	}

	/**
	 * Determine if events and listeners should be automatically discovered.
	 *
	 * @return bool
	 */
	public function shouldDiscoverEvents()
	{
		return false;
	}
}
