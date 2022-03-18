<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
	public function creating(Product $product): void
	{
	}

	public function created(Product $product): void
	{
	}

	public function updating(Product $product): void
	{
	}

	public function updated(Product $product): void
	{
		$product->syncUnits();
	}

	public function saving(Product $product): void
	{
	}

	public function saved(Product $product): void
	{
	}

	public function deleting(Product $product): void
	{
		$product->categories()->detach();
		$product->materials()->detach();
		$product->menus()->detach();

		$product->units()->detach();
	}

	public function deleted(Product $product): void
	{
	}

	public function restoring(Product $product): void
	{
	}

	public function restored(Product $product): void
	{
	}

	public function forceDeleted(Product $product): void
	{
	}
}
