<?php

namespace App\Defaults;

class Menu
{
	public static function list()
	{
		return [
			[
				'slug' => 'room_menu',
				'name' => [
					'en' => 'Menu of Room',
					'tr' => 'Oda Menüsü',
				],
				'all_units' => true,
				'units_ids' => [],
			],
			[
				'slug' => 'restaurant_menu',
				'name' => [
					'en' => 'Menu of Restaurant',
					'tr' => 'Restorant Menüsü',
				],
				'all_units' => false,
				'units_ids' => [],
			],
		];
	}
}
