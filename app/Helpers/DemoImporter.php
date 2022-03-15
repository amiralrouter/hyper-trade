<?php

namespace App\Helpers;

use App\Models\Menu;
use App\Models\Unit;
use App\Models\User;
use App\Models\Block;
use App\Models\Floor;
use App\Models\Product;
use App\Models\Business;
use App\Models\Category;
use App\Models\Material;
use App\Models\UnitType;
use App\Models\Department;

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
			$name = (string) $item;
			$unit_types[$name] = UnitType::create([
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
			$unit_type = (string) $item['unit_type'];
			$units[$id] = Unit::create([
				'business_id' => $business_id,
				'floor_id' => $floors[$floor_id]->id,
				'unit_type_id' => $unit_types[$unit_type]->id,
				'name' => $name,
			]);
		}

		// categories
		$categories = [];
		foreach ($this->data->categories->category as $item) {
			$name = (string) $item;
			$category_type = (string) $item['category_type'];
			$categories[$name] = Category::create([
				'business_id' => $business_id,
				'name' => $name,
				'category_type' => $category_type,
			]);
		}

		// materials
		$materials = [];
		foreach ($this->data->materials->material as $item) {
			$name = (string) $item;
			$materials[$name] = Material::create([
				'business_id' => $business_id,
				'name' => $name,
			]);
		}

		// options

		// menus
		$menus = [];
		foreach ($this->data->menus->menu as $item) {
			$name = (string) $item;
			$menus[$name] = Menu::create([
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
			foreach ($item->category as $key) {
				$category_ids[] = $categories[(string) $key]->id;
			}

			$material_ids = [];
			foreach ($item->material as $key) {
				$material_ids[] = $materials[(string) $key]->id;
			}

			$menu_ids = [];
			foreach ($item->menu as $key) {
				$menu_ids[] = $menus[(string) $key]->id;
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

		// departments
		$departments = [];
		foreach ($this->data->departments->department as $name) {
			$departments[(string) $name] = Department::create([
				'business_id' => $business_id,
				'name' => (string) $name,
			]);
		}

		// users
		$users = [];
		foreach ($this->data->users->user as $item) {
			$firstname = (string) $item['firstname'];
			$lastname = (string) $item['lastname'];
			$username = (string) $item['username'];
			$related_with_all_units = ((string) $item['related_with_all_units'] ?? '') === 'true';
			$user = User::create([
				'business_id' => $business_id,
				'firstname' => $firstname,
				'lastname' => $lastname,
				'username' => $username,
				'related_with_all_units' => $related_with_all_units,
			]);
			$department_ids = [];
			foreach ($item->department as $key) {
				$department_ids[] = $departments[(string) $key]->id;
			}
			$user->departments()->sync($department_ids);
		}
	}
}
