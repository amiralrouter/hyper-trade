<?php

namespace App\Helpers;

use App\Models\Unit;
use App\Models\Department;

class UnitUserSynchronizer
{
	public static function sync(Unit $unit): void
	{
		$departments = Department::where('business_id', $unit->business_id)->get();

		$unit_block_id = $unit->block_id;
		$unit_floor_id = $unit->floor_id;

		// ORDERS
		$related_departments = [];
		foreach ($departments as $department) {
			if ($department->order_related_all_units) {
				$related_departments[] = $department;
			} elseif (\in_array($unit->id, (array) $department->order_related_units, true)) {
				$related_departments[] = $department;
			} elseif (\in_array($unit_block_id, (array) $department->orders_related_block, true)) {
				$related_departments[] = $department;
			} elseif (\in_array($unit_floor_id, (array) $department->orders_related_floor, true)) {
				$related_departments[] = $department;
			}
		}
		$unit->order_users()->detach();
		foreach ($related_departments as $department) {
			foreach ($department->users as $user) {
				$unit->order_users()->attach($user->id);
			}
		}

		// DEMANDS
		$related_departments = [];
		foreach ($departments as $department) {
			if ($department->demand_related_all_units) {
				$related_departments[] = $department;
			} elseif (\in_array($unit->id, (array) $department->demand_related_units, true)) {
				$related_departments[] = $department;
			} elseif (\in_array($unit_block_id, (array) $department->demands_related_block, true)) {
				$related_departments[] = $department;
			} elseif (\in_array($unit_floor_id, (array) $department->demands_related_floor, true)) {
				$related_departments[] = $department;
			}
		}
		$unit->demand_users()->detach();
		foreach ($related_departments as $department) {
			foreach ($department->users as $user) {
				$unit->demand_users()->attach($user->id);
			}
		}
	}
}
