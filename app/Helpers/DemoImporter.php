<?php

namespace App\Helpers;

use App\Models\Menu;
use App\Models\Unit;
use App\Models\Block;
use App\Models\Floor;
use App\Models\Product;
use App\Models\Business;
use App\Models\Category;
use App\Models\Material;
use App\Models\UnitType;

class DemoImporter
{
	private $business;

	private $demo_file_path;

	private $data;

	public function getList()
	{
		// get storage/demo path
		$path = storage_path('demo');
		// get all xml files in path
		$files = glob($path . '/*.xml');
		// get list of files
		$list = [];
		foreach ($files as $file) {
			$data = simplexml_load_file($file);
			$list[] = [
				'path' => $file,
				// file name without extension
				'name' => $data->info['title'][0],
			];
		}

		return $list;
	}

	public function setBusinessId($id): void
	{
		$this->business = Business::find($id);
	}

	public function setDemoId($id): void
	{
		$this->demo_file_path = $this->getList()[$id]['path'];
		$this->data = simplexml_load_file($this->demo_file_path);
		// print_r($data->info['title']);
	}

	public function import(): void
	{
		echo 'Importing demo data...';
		echo $this->business->name . PHP_EOL;

		$business_id = $this->business->id;

		// blocks
		$blocks = [];
		foreach ($this->data->blocks->block as $item) {
			$id = (string) $item['id'];
			$name = (string) $item['name'];
			$blocks[$id] = Block::create([
				'business_id' => $business_id,
				'name' => $name,
			]);
		}

		// floors
		$floors = [];
		foreach ($this->data->floors->floor as $item) {
			$id = (string) $item['id'];
			$name = (string) $item['name'];
			$block_id = (string) $item['block_id'];
			$floors[$id] = Floor::create([
				'business_id' => $business_id,
				'block_id' => $blocks[$block_id]->id,
				'name' => $name,
			]);
		}

		// unit_types
		$unit_types = [];
		foreach ($this->data->unit_types->unit_type as $item) {
			$id = (string) $item['id'];
			$name = (string) $item['name'];
			$unit_types[$id] = UnitType::create([
				'business_id' => $business_id,
				'name' => $name,
			]);
		}

		// units
		$units = [];
		foreach ($this->data->units->unit as $item) {
			$id = (string) $item['id'];
			$name = (string) $item['name'];
			$floor_id = (string) $item['floor_id'];
			$unit_type_id = (string) $item['unit_type_id'];
			$units[$id] = Unit::create([
				'business_id' => $business_id,
				'floor_id' => $floors[$floor_id]->id,
				'unit_type_id' => $unit_types[$unit_type_id]->id,
				'name' => $name,
			]);
		}

		// categories
		$categories = [];
		foreach ($this->data->categories->category as $item) {
			$id = (string) $item['id'];
			$name = (string) $item['name'];
			$category_type = (string) $item['category_type'];
			$categories[$id] = Category::create([
				'business_id' => $business_id,
				'name' => $name,
				'category_type' => $category_type,
			]);
		}

		// materials
		$materials = [];
		foreach ($this->data->materials->material as $item) {
			$id = (string) $item['id'];
			$name = (string) $item['name'];
			$materials[$id] = Material::create([
				'business_id' => $business_id,
				'name' => $name,
			]);
		}

		// options

		// menus
		$menus = [];
		foreach ($this->data->menus->menu as $item) {
			$id = (string) $item['id'];
			$name = (string) $item['name'];
			$menus[$id] = Menu::create([
				'business_id' => $business_id,
				'name' => $name,
			]);
		}

		// products
		$products = [];
		foreach ($this->data->products->product as $item) {
			$id = (string) $item['id'];
			$name = (string) $item['name'];
			$price = (float) $item['price'] ?? '';
			$preparation_time = (int) $item['preparation_time'] ?? '';

			$category_ids = [];
			$item_categories = (string) $item['categories'] ?? '';
			$item_category_ids = array_filter(explode(',', $item_categories));
			foreach ($item_category_ids as $item_category_id) {
				$category_ids[] = $categories[$item_category_id]->id;
			}

			$material_ids = [];
			$item_materials = (string) $item['materials'] ?? '';
			$item_material_ids = array_filter(explode(',', $item_materials));
			foreach ($item_material_ids as $item_material_id) {
				$material_ids[] = $materials[$item_material_id]->id;
			}

			$menu_ids = [];
			$item_menus = (string) $item['menus'] ?? '';
			$item_menu_ids = array_filter(explode(',', $item_menus));
			foreach ($item_menu_ids as $item_menu_id) {
				$menu_ids[] = $menus[$item_menu_id]->id;
			}

			$products[$id] = Product::create([
				'business_id' => $business_id,
				'name' => $name,
				'price' => $price,
				'preparation_time' => $preparation_time,
			]);
			$products[$id]->categories()->sync($category_ids);
			$products[$id]->materials()->sync($material_ids);
			$products[$id]->menus()->sync($menu_ids);
		}
	}
}
