<?php

namespace App\Defaults;

class Department
{
	public static function list()
	{
		return [
			[
				'slug' => 'roomservice',
				'name' => [
					'en' => 'Room service',
					'tr' => 'Oda Servisi',
				],
			],
			[
				'slug' => 'floorattendant',
				'name' => [
					'en' => 'Floor Attendant',
					'tr' => 'Kat Görevlisi',
				],
			],
			[
				'slug' => 'loby',
				'name' => [
					'en' => 'Loby',
					'tr' => 'Lobi',
				],
			],
			[
				'slug' => 'valet',
				'name' => [
					'en' => 'Valet',
					'tr' => 'Vale',
				],
			],
		];
	}
}
