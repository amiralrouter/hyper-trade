<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Unit;
use App\Models\User;
use App\Models\Block;
use App\Models\Floor;
use App\Models\Guest;
use App\Models\Demand;
use App\Models\Printer;
use App\Models\Product;
use App\Models\Business;
use App\Models\Category;
use App\Models\Material;
use App\Models\Department;
use App\Observers\MenuObserver;
use App\Observers\UnitObserver;
use App\Observers\UserObserver;
use App\Observers\BlockObserver;
use App\Observers\FloorObserver;
use App\Observers\GuestObserver;
use App\Observers\PrinterObserver;
use App\Observers\ProductObserver;
use App\Observers\BusinessObserver;
use App\Observers\CategoryObserver;
use App\Observers\MaterialObserver;
use App\Observers\DepartmentObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register(): void
	{
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
		Block::observe(BlockObserver::class);
		Business::observe(BusinessObserver::class);
		Category::observe(CategoryObserver::class);
		// Demand::observe(DemandObserver::class);
		Floor::observe(FloorObserver::class);
		Guest::observe(GuestObserver::class);
		// Language::observe(LanguageObserver::class);
		Material::observe(MaterialObserver::class);
		Menu::observe(MenuObserver::class);
		// Order::observe(OrderObserver::class);
		Product::observe(ProductObserver::class);
		Printer::observe(PrinterObserver::class);
		Unit::observe(UnitObserver::class);
		Department::observe(DepartmentObserver::class);
		User::observe(UserObserver::class);
		// UnitType::observe(UnitTypeObserver::class);
	}
}
