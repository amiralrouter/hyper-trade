<?php

namespace App\Providers;

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
		// // USER EVENTS
		// UserCreated::class => [
		// 	\App\Listeners\UserCreateTelegram::class,
		// ],
		// UserDeleting::class => [
		// 	\App\Listeners\UserDeleteTelegram::class,
		// ],
		// // BUSINESS EVENTS
		// BusinessCreated::class => [
		// ],
		// BLOCK EVENTS
		// BlockDeleting::class => [
		// 	\App\Listeners\BlockDeleteFloors::class,
		// ],
		// FLOOR EVENTS
		// FloorDeleting::class => [
		// 	\App\Listeners\FloorDetachUnits::class,
		// ],
		// UNIT EVENTS
		// UnitCreated::class => [
		// 	// \App\Listeners\UnitCreatePin::class,
		// 	// \App\Listeners\UnitCreateWallet::class,
		// 	// \App\Listeners\UnitConnectUsers::class,
		// 	// \App\Listeners\UnitSyncProducts::class,
		// ],
		// UnitUpdated::class => [
		// 	\App\Listeners\UnitSyncProducts::class,
		// ],
		// UnitReset::class => [
		// 	\App\Listeners\UnitCreatePin::class,
		// 	\App\Listeners\UnitDropWallet::class,
		// 	\App\Listeners\UnitCreateWallet::class,
		// ],
		// UnitDeleting::class => [
		// 	\App\Listeners\UnitDropWallet::class,
		// 	\App\Listeners\UnitDisconnectUsers::class,
		// ],
		// GUEST EVENTS
		// GuestCreated::class => [
		// 	\App\Listeners\GuestSetLanguage::class,
		// 	\App\Listeners\GuestSetFullname::class,
		// ],
		// PRINTER EVENTS
		// PrinterCreated::class => [
		// 	\App\Listeners\PrinterCreateUuid::class,
		// ],
		// CATEGORY EVENTS
		// CategoryDeleting::class => [
		// 	\App\Listeners\CategoryDetachProducts::class,
		// 	\App\Listeners\CategoryDetachDemands::class,
		// ],
		// PRODUCT EVENTS
		// ProductCreated::class => [
		// 	\App\Listeners\ProductSyncUnits::class,
		// ],
		// ProductUpdated::class => [
		// 	\App\Listeners\ProductSyncUnits::class,
		// ],
		// ProductDeleting::class => [
		// 	\App\Listeners\ProductDetachCategories::class,
		// 	\App\Listeners\ProductDetachMaterials::class,
		// 	\App\Listeners\ProductDetachMenus::class,
		// 	\App\Listeners\ProductDetachUnits::class,
		// ],
		// // ORDER EVENTS
		// OrderCreated::class => [
		// ],
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
