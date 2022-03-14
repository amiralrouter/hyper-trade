<?php

namespace App\Console\Commands;

use App\Models\Unit;
use App\Models\Block;
use App\Models\Floor;
use App\Models\Product;
use App\Models\Category;
use App\Models\UnitType;
use App\Enums\CategoryType;
use Illuminate\Console\Command;
use App\Helpers\BusinessBuilder;
use App\Helpers\DemoImporter;
use App\Models\Material;

class Beta extends Command
{
	protected $signature = 'beta';

	protected $description = 'Create beta testing commands';

	public function __construct()
	{
		parent::__construct();
	}

	public function handle()
	{
		$this->info('Creating beta business');

		$business_builder = new BusinessBuilder();
		$business_builder->setName('Gloria Jeans');
		$business_builder->setLanguageId(1);
		$business_builder->setRoomCount(0);
		$business_builder->setDeskCount(0);
		$business_builder->build();

		$business = $business_builder->getBusiness();

		$importer = new DemoImporter();

		$demos = $importer->getList();

		foreach ($demos as $i => $demo) {
			$this->info($i . ' - ' . $demo['name']);
		}

		$demo_id = 0;
		// $demo_id = $this->ask('choose id');

		$importer->setDemoId($demo_id);
		$importer->setBusinessId($business->id);
		$importer->import();

		// $block_front = Block::create([
		// 	'business_id' => $business->id,
		// 	'name' => 'Ön taraf',
		// ]);
		// $block_front_ground_floor = Floor::create([
		// 	'business_id' => $business->id,
		// 	'block_id' => $block_front->id,
		// 	'name' => 'Zemin Kat',
		// ]);

		// $block_back = Block::create([
		// 	'business_id' => $business->id,
		// 	'name' => 'Arka taraf',
		// ]);
		// $block_back_ground_floor = Floor::create([
		// 	'business_id' => $business->id,
		// 	'block_id' => $block_back->id,
		// 	'name' => 'Zemin Kat',
		// ]);

		// $unit_type_desk = UnitType::create([
		// 	'business_id' => $business->id,
		// 	'name' => 'Masa',
		// ]);

		// for ($i = 1; $i <= 10; ++$i) {
		// 	Unit::create([
		// 		'business_id' => $business->id,
		// 		'floor_id' => $block_front_ground_floor->id,
		// 		'name' => 'Ön taraf ' . $i,
		// 		'unit_type_id' => $unit_type_desk->id,
		// 		'is_active' => true,
		// 	]);
		// }

		// for ($i = 1; $i <= 10; ++$i) {
		// 	Unit::create([
		// 		'business_id' => $business->id,
		// 		'floor_id' => $block_back_ground_floor->id,
		// 		'name' => 'Arka taraf ' . $i,
		// 		'unit_type_id' => $unit_type_desk->id,
		// 		'is_active' => true,
		// 	]);
		// }

		// $beverage_category = Category::create([
		// 	'business_id' => $business->id,
		// 	'name' => 'İçecekler',
		// 	'category_type' => CategoryType::PRODUCT,
		// ]);
		// $food_category = Category::create([
		// 	'business_id' => $business->id,
		// 	'name' => 'Yiyecekler',
		// 	'category_type' => CategoryType::PRODUCT,
		// ]);

		// $material_crema = Material::create([
		// 	'business_id' => $business->id,
		// 	'name' => 'Crema',
		// ]);

		// $product = Product::create([
		// 	'business_id' => $business->id,
		// 	'name' => 'Fincan Çay',
		// ]);
		// $product->categories()->attach($beverage_category->id);

		// $product = Product::create([
		// 	'business_id' => $business->id,
		// 	'name' => 'Filtre Kahve',
		// ]);
		// $product->categories()->attach($beverage_category->id);

		// $product = Product::create([
		// 	'business_id' => $business->id,
		// 	'name' => 'Hamburger',
		// ]);
		// $product->categories()->attach($food_category->id);

		// $product = Product::create([
		// 	'business_id' => $business->id,
		// 	'name' => 'Pizza',
		// ]);
		// $product->categories()->attach($food_category->id);

		return 0;
	}
}
