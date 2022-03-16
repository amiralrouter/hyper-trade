<?php

namespace App\Providers;

use App\Events\BlockDeleting;
use App\Events\BusinessCreated;
use App\Events\CategoryDeleting;
use App\Events\FloorDeleting;
use App\Events\GuestCreated;
use App\Events\OrderCreated;
use App\Events\PrinterCreated;
use App\Events\ProductDeleting;
use App\Events\UnitCreated;
use App\Events\UnitDeleting;
use App\Events\UnitReset;
use App\Events\UserCreated;
use App\Events\UserDeleting;
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
			\App\Listeners\UserCreateTelegram::class,
		],
		UserDeleting::class => [
			\App\Listeners\UserDeleteTelegram::class,
		],
		// BUSINESS EVENTS
		BusinessCreated::class => [
		],
		// BLOCK EVENTS
		BlockDeleting::class => [
			\App\Listeners\BlockDeleteFloors::class,
		],
		// FLOOR EVENTS
		FloorDeleting::class => [
			\App\Listeners\FloorDerelictUnits::class,
		],
		// UNIT EVENTS
		UnitCreated::class => [
			\App\Listeners\UnitCreatePin::class,
			\App\Listeners\UnitCreateWallet::class,
			\App\Listeners\UnitConnectUsers::class,
		],
		UnitSaving::class => [
			\App\Listeners\UnitSetBlock::class,
		],
		UnitReset::class => [
			\App\Listeners\UnitCreatePin::class,
			\App\Listeners\UnitDropWallet::class,
			\App\Listeners\UnitCreateWallet::class,
		],
		UnitDeleting::class => [
			\App\Listeners\UnitDropWallet::class,
			\App\Listeners\UnitDisconnectUsers::class,
		],
		// GUEST EVENTS
		GuestCreated::class => [
			\App\Listeners\GuestSetLanguage::class,
			\App\Listeners\GuestSetFullname::class,
		],
		// PRINTER EVENTS
		PrinterCreated::class => [
			\App\Listeners\PrinterCreateUuid::class,
		],
		// CATEGORY EVENTS
		CategoryDeleting::class => [
			\App\Listeners\CategoryDerelictProducts::class,
			\App\Listeners\CategoryDerelictDemands::class,
		],
		// PRODUCT EVENTS
		ProductDeleting::class => [
			\App\Listeners\ProductDecagorize::class,
			\App\Listeners\ProductDematerialize::class,
			\App\Listeners\ProductDemenu::class,
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
