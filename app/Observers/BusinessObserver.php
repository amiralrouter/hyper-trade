<?php

namespace App\Observers;

use App\Models\Business;
use App\Models\Department;
use App\Models\User;

class BusinessObserver
{
	public function creating(Business $business): void
	{
	}

	public function created(Business $business): void
	{
		$department = Department::create([
			'business_id' => $business->id,
			'name' => 'Yönetim',
			'order_all_units' => true,
			'petition_all_units' => true,
		]);

		$user = User::create([
			'business_id' => $business->id,
			'firstname' => 'Yönetici',
			'lastname' => 'Admin',
			'username' => 'admin',
		]);

		$user->departments()->attach($department->id);
	}

	public function updating(Business $business): void
	{
	}

	public function updated(Business $business): void
	{
	}

	public function saving(Business $business): void
	{
	}

	public function saved(Business $business): void
	{
	}

	public function deleting(Business $business): void
	{
		// delete all blocks
		$blocks = $business->blocks;
		if (!empty($blocks)) {
			foreach ($blocks as $block) {
				$block->delete();
			}
		}

		// delete all the units
		$units = $business->units;
		if (!empty($units)) {
			foreach ($units as $unit) {
				$unit->delete();
			}
		}

		// delete all the products
		$products = $business->products;
		if (!empty($products)) {
			foreach ($products as $product) {
				$product->delete();
			}
		}

		// delete all the categories
		$categories = $business->categories;
		if (!empty($categories)) {
			foreach ($categories as $category) {
				$category->delete();
			}
		}

		// delete all the demands
		$demands = $business->demands;
		if (!empty($demands)) {
			foreach ($demands as $demand) {
				$demand->delete();
			}
		}

		// delete all the materials
		$materials = $business->materials;
		if (!empty($materials)) {
			foreach ($materials as $material) {
				$material->delete();
			}
		}

		// delete all the menus
		$menus = $business->menus;
		if (!empty($menus)) {
			foreach ($menus as $menu) {
				$menu->delete();
			}
		}

		// delete all the orders
		// !! it will turn to chuncked order
		$orders = $business->orders;
		if (!empty($orders)) {
			foreach ($orders as $order) {
				$order->delete();
			}
		}

		// delete all departments
		$departments = $business->departments;
		if (!empty($departments)) {
			foreach ($departments as $department) {
				$department->delete();
			}
		}

		// delete all the users
		$users = $business->users;
		if (!empty($users)) {
			foreach ($users as $user) {
				$user->delete();
			}
		}

		// delete all the wallets
		$wallets = $business->wallets;
		if (!empty($wallets)) {
			foreach ($wallets as $wallet) {
				$wallet->delete();
			}
		}
	}

	public function deleted(Business $business): void
	{
	}

	public function restoring(Business $business): void
	{
	}

	public function restored(Business $business): void
	{
	}

	public function forceDeleted(Business $business): void
	{
	}
}
