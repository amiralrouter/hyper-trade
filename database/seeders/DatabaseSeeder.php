<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\Block;
use App\Models\Floor;
use App\Models\Business;
use App\Models\UnitType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		// \App\Models\User::factory(10)->create();

		// call LanguageSeeder
		$this->call(LanguageSeeder::class);

		$business = Business::create([
			'name' => 'Babos Hotel',
		]);

		$blocks = [];
		$floors = [];

		$blocks[] = Block::create([
			'business_id' => $business->id,
			'name' => 'Lake View',
		]);
		$blocks[] = Block::create([
			'business_id' => $business->id,
			'name' => 'Forest View',
		]);

		foreach ($blocks as $block) {
			for ($i = 1; $i <= 2; ++$i) {
				$floor = Floor::create([
					'business_id' => $business->id,
					'block_id' => $block->id,
					'name' => sprintf('%s Floor %s', $block->name, $i),
				]);
				$floors[] = $floor;
			}
		}

		$unit_type_room = UnitType::create([
			'business_id' => $business->id,
			'name' => 'Room',
		]);

		$unit_type_desk = UnitType::create([
			'business_id' => $business->id,
			'name' => 'Desk',
		]);

		$unit_no = 100;
		foreach ($floors as $floor) {
			for ($i = 1; $i <= 10; ++$i) {
				++$unit_no;
				$unit = Unit::create([
					'business_id' => $business->id,
					'floor_id' => $floor->id,
					'unit_type_id' => $unit_type_room->id,
					'name' => sprintf('%s-%s', $floor->name, $unit_no),
				]);
			}
		}
	}
}
