<?php

namespace App\Defaults;

class Category
{
	public static function list()
	{
		return [
			[
				'slug' => 'breakfast',
				'name' => [
					'en' => 'Breakfast',
					'tr' => 'Kahvaltı',
				],
				'images' => [],
			],
			[
				'slug' => 'soups',
				'name' => [
					'en' => 'Soups',
					'tr' => 'Çorbalar',
				],
				'images' => [],
			],
			[
				'slug' => 'salads',
				'name' => [
					'en' => 'Salads',
					'tr' => 'Salatalar',
				],
				'images' => [],
			],
			[
				'slug' => 'burgers',
				'name' => [
					'en' => 'Burgers',
					'tr' => 'Burgerler',
				],
				'images' => [],
			],
			[
				'slug' => 'pastas',
				'name' => [
					'en' => 'Pastas',
					'tr' => 'Makarnalar',
				],
				'images' => [],
			],
			[
				'slug' => 'maindishes',
				'name' => [
					'en' => 'Main Dishes',
					'tr' => 'Ana Yemekler',
				],
				'images' => [],
			],
			[
				'slug' => 'fruitsnackplates',
				'name' => [
					'en' => 'Fruit & Snack Plates',
					'tr' => 'Meyve Ve Çerez Tabakları',
				],
				'images' => [],
			],
		];
	}
}
