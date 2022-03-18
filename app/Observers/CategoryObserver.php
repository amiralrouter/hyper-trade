<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
	public function creating(Category $category): void
	{
	}

	public function created(Category $category): void
	{
	}

	public function updating(Category $category): void
	{
	}

	public function updated(Category $category): void
	{
	}

	public function saving(Category $category): void
	{
	}

	public function saved(Category $category): void
	{
	}

	public function deleting(Category $category): void
	{
		$category->products()->detach();

		$category->demands()->update(['category_id' => null]);
	}

	public function deleted(Category $category): void
	{
	}

	public function restoring(Category $category): void
	{
	}

	public function restored(Category $category): void
	{
	}

	public function forceDeleted(Category $category): void
	{
	}
}
