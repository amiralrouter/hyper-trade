<?php

namespace App\Helpers;

use App\Models\Menu;
use App\Models\Unit;
use App\Models\Block;
use App\Models\Product;
use App\Models\Business;
use App\Models\Category;
use App\Models\Material;
use App\Models\UnitType;
use App\Models\Department;
use App\Enums\CategoryType;

class DemoDataBuilder
{
	private $business;

	private $block_hotel;

	private $block_restaurant;

	public function __construct($business_id = null)
	{
		if (null !== $business_id) {
			$this->setBusinessId($business_id);
		}
	}

	public function setBusinessId($id)
	{
		$this->business = Business::find($id);

		return $this;
	}

	public function log($text): void
	{
		// if on console
		if (\PHP_SAPI === 'cli') {
			echo $text . PHP_EOL;
		}
	}

	public function flushAll(): void
	{
		$this->log('Flushing all data');
		$this->flushUnits();
		$this->flushUnitTypes();
		$this->flushBlocks();

		$this->flushProducts();
		$this->flushCategories();
		$this->flushMaterials();
		$this->flushMenus();

		$this->flushDepartments();
	}

	public function flushUnits(): void
	{
		$this->log('Flushing units');
		$units = Unit::where('business_id', $this->business->id)->get();

		foreach ($units as $unit) {
			$unit->delete();
		}
	}

	public function flushUnitTypes(): void
	{
		$this->log('Flushing unit types');
		$unit_types = UnitType::where('business_id', $this->business->id)->get();

		foreach ($unit_types as $unit_type) {
			$unit_type->delete();
		}
	}

	public function flushBlocks(): void
	{
		$this->log('Flushing blocks');
		$blocks = Block::where('business_id', $this->business->id)->get();

		foreach ($blocks as $block) {
			$block->delete();
		}
	}

	public function flushProducts(): void
	{
		$this->log('Flushing products');
		$products = Product::where('business_id', $this->business->id)->get();

		foreach ($products as $product) {
			$product->delete();
		}
	}

	public function flushMenus(): void
	{
		$this->log('Flushing menus');
		$menus = Menu::where('business_id', $this->business->id)->get();

		foreach ($menus as $menu) {
			$menu->delete();
		}
	}

	public function flushMaterials(): void
	{
		$this->log('Flushing materials');
		$materials = Material::where('business_id', $this->business->id)->get();

		foreach ($materials as $material) {
			$material->delete();
		}
	}

	public function flushCategories(): void
	{
		$this->log('Flushing categories');
		$categories = Category::where('business_id', $this->business->id)->get();

		foreach ($categories as $category) {
			$category->delete();
		}
	}

	public function flushDepartments(): void
	{
		$this->log('Flushing departments');
		$departments = Department::where('business_id', $this->business->id)->get();

		foreach ($departments as $department) {
			$department->delete();
		}
	}

	public function createBlocks(): void
	{
		$this->log('Creating blocks');
		$this->block_hotel = Block::create([
			'business_id' => $this->business->id,
			'name' => 'Hotel',
		]);
		$this->block_restaurant = Block::create([
			'business_id' => $this->business->id,
			'name' => 'Restaurant',
		]);
	}

	public function createFloors(): void
	{
		$this->log('Creating floors');
		$blocks = Block::where('business_id', $this->business->id)->get();

		foreach ($blocks as $block) {
			$block->floors()->create([
				'business_id' => $this->business->id,
				'block_id' => $block->id,
				'name' => 'Floor 1',
			]);
			$block->floors()->create([
				'business_id' => $this->business->id,
				'block_id' => $block->id,
				'name' => 'Floor 2',
			]);
		}
	}

	public function createRooms(): void
	{
		$this->log('Creating rooms');
		$unit_type = UnitType::create([
			'business_id' => $this->business->id,
			'name' => 'Rooms',
		]);
		$this->log('Unit type: ' . $unit_type->id);
		$floors = $this->block_hotel->floors()->get();
		$unit_no = 1;
		foreach ($floors as $floor) {
			$this->log('Creating rooms for floor ' . $floor->name);
			for ($i = 0; $i <= 5; ++$i) {
				$this->log('Creating room ' . $unit_no);
				$unit = new Unit();
				$unit->business_id = $this->business->id;
				$unit->floor_id = $floor->id;
				$unit->unit_type_id = $unit_type->id;
				$unit->name = 'Room ' . $unit_no;
				$unit->save();
				++$unit_no;

				$this->log('Created room ' . $unit->name . ' on floor ' . $floor->name . ' in block ' . $this->block_hotel->name);
			}
		}
	}

	public function createDesks(): void
	{
		$this->log('Creating desks');
		$unit_type = UnitType::create([
			'business_id' => $this->business->id,
			'name' => 'Desk',
		]);
		$floors = $this->block_restaurant->floors()->get();
		$unit_no = 1;
		foreach ($floors as $floor) {
			for ($i = 0; $i <= 5; ++$i) {
				$unit = new Unit();
				$unit->business_id = $this->business->id;
				$unit->floor_id = $floor->id;
				$unit->unit_type_id = $unit_type->id;
				$unit->name = 'Desk ' . $unit_no;
				$unit->save();
				++$unit_no;
			}
		}
	}

	public function createCategories(): void
	{
		$this->log('Creating categories');
		foreach (\App\Defaults\Category::list() as $item) {
			Category::create([
				'business_id' => $this->business->id,
				'name' => $item['name'],
				'slug' => $item['slug'],
				'category_type' => CategoryType::PRODUCT,
			]);
		}
	}

	public function createMaterials(): void
	{
		$this->log('Creating materials');
		foreach (\App\Defaults\Material::list() as $item) {
			Material::create([
				'business_id' => $this->business->id,
				'name' => $item['name'],
				'slug' => $item['slug'],
			]);
		}
	}

	public function createMenus(): void
	{
		$this->log('Creating menus');
		foreach (\App\Defaults\Menu::list() as $item) {
			Menu::create([
				'business_id' => $this->business->id,
				'name' => $item['name'],
				'slug' => $item['slug'],
			]);
		}
	}

	public function createDepartments(): void
	{
		$this->log('Creating departments');
		foreach (\App\Defaults\Department::list() as $item) {
			Department::create([
				'business_id' => $this->business->id,
				'name' => $item['name'],
				'slug' => $item['slug'],
			]);
		}
	}

	public function createProducts(): void
	{
		$this->log('Creating products');
		foreach (\App\Defaults\Product::list() as $item) {
			// log
			$this->log('Creating product ' . $item['name']['tr']);
			$material_ids = [];
			foreach ($item['materials'] as $material) {
				$this->log('Material ' . $material);
				$row = Material::where('business_id', $this->business->id)->where('slug', $material)->first();
				if ($row) {
					$material_ids[] = $row->id;
				} else {
					$this->log('Material not found !!');
				}
			}
			$category_ids = [];
			foreach ($item['categories'] as $category) {
				$this->log('Category ' . $category);
				$row = Category::where('business_id', $this->business->id)->where('slug', $category)->first();
				if ($row) {
					$category_ids[] = $row->id;
				} else {
					$this->log('Category not found !!');
				}
			}
			$menu_ids = [];
			foreach ($item['menus'] as $menu) {
				$this->log('Menu ' . $menu);
				$row = Menu::where('business_id', $this->business->id)->where('slug', $menu)->first();
				if ($row) {
					$menu_ids[] = $row->id;
				} else {
					$this->log('Menu not found !!');
				}
			}

			$product = Product::create([
				'business_id' => $this->business->id,
				'name' => $item['name'],
			]);
			$product->categories()->attach($category_ids);
			$product->menus()->attach($menu_ids);
			$product->materials()->attach($material_ids);
		}
	}

	public function build(): void
	{
		$this->flushAll();

		$this->createBlocks();
		$this->createFloors();
		$this->createRooms();
		$this->createDesks();

		$this->createCategories();
		$this->createMaterials();
		$this->createMenus();
		$this->createProducts();

		$this->createDepartments();

		$this->log('Done');
	}
}
