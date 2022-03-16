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
				'name' => (string) $data->title,
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

	public function getTranslates($obj, $key = 'name')
	{
		$list = [];
		// get child node by key
		$node = $obj->xpath("{$key}")[0];

		foreach ($node as $child) {
			// get child tag name
			$name = $child->getName();
			// get child tag value
			$value = (string) $child;
			// add to list
			$list[$name] = $value;
		}

		return $list;
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
			$name = $this->getTranslates($item, 'name');
			$blocks[$id] = Block::create([
				'business_id' => $business_id,
				'name' => $name,
			]);
		}

		// floors
		$floors = [];
		foreach ($this->data->floors->floor as $item) {
			$id = (string) $item['id'];
			$name = $this->getTranslates($item, 'name');
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
			$name = $this->getTranslates($item, 'name');
			$unit_types[$id] = UnitType::create([
				'business_id' => $business_id,
				'name' => $name,
			]);
		}

		// units
		$units = [];
		foreach ($this->data->units->unit as $item) {
			$id = (string) $item['id'];
			$name = $this->getTranslates($item, 'name');
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
			$name = $this->getTranslates($item, 'name');
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
			$name = $this->getTranslates($item, 'name');
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
			$name = $this->getTranslates($item, 'name');
			$menus[$id] = Menu::create([
				'business_id' => $business_id,
				'name' => $name,
			]);

			$block_ids = [];
			foreach ($item->block as $row) {
				$block_ids[] = $blocks[(string) $row['id']]->id;
			}
			$floor_ids = [];
			foreach ($item->floor as $row) {
				$floor_ids[] = $floors[(string) $row['id']]->id;
			}
			$unit_ids = [];
			foreach ($item->unit as $row) {
				$unit_ids[] = $units[(string) $row['id']]->id;
			}
			foreach ($block_ids as $block_id) {
				$block = Block::find($block_id);
				$unit_ids = array_merge($unit_ids, $block->units->pluck('id')->toArray());
			}
			foreach ($floor_ids as $floor_id) {
				$floor = Floor::find($floor_id);
				$unit_ids = array_merge($unit_ids, $floor->units->pluck('id')->toArray());
			}
			$unit_ids = array_unique($unit_ids);
			// set menu units by unit ids
			$menus[$id]->units()->sync($unit_ids);
		}

		// products
		$products = [];
		foreach ($this->data->products->product as $item) {
			$id = (string) $item['id'];
			$name = $this->getTranslates($item, 'name');
			$description = $this->getTranslates($item, 'description');
			$price = (float) $item->price ?? 0;
			$preparation_time = (int) $item->preparation_time ?? 0;

			$category_ids = [];
			foreach ($item->category as $row) {
				$category_ids[] = $categories[(string) $row['id']]->id;
			}

			$material_ids = [];
			foreach ($item->material as $row) {
				echo $row['id'] . PHP_EOL;
				$material_ids[] = $materials[(string) $row['id']]->id;
			}

			$menu_ids = [];
			foreach ($item->menu as $row) {
				$menu_ids[] = $menus[(string) $row['id']]->id;
			}

			$product = Product::create([
				'business_id' => $business_id,
				'name' => $name,
				'description' => $description,
				'price' => $price,
				'preparation_time' => $preparation_time,
			]);
			$product->categories()->sync($category_ids);
			$product->materials()->sync($material_ids);
			$product->menus()->sync($menu_ids);
			$products[$id] = $product;
			// call product updated event
			event(new \App\Events\ProductUpdated($product));
		}

		// departments
		$departments = [];
		foreach ($this->data->departments->department as $item) {
			$name = (string) $item['name'];
			$order_related_all_units = ((string) $item['order_related_all_units'] ?? '') === 'true';
			$order_related_blocks = [];
			$order_related_floors = [];
			$order_related_units = [];

			$demand_related_all_units = ((string) $item['demand_related_all_units'] ?? '') === 'true';
			$demand_related_blocks = [];
			$demand_related_floors = [];
			$demand_related_units = [];

			foreach ($item->order_related_block_id as $id) {
				$order_related_blocks[] = $blocks[(int) $id]->id;
			}
			foreach ($item->order_related_floor_id as $id) {
				$order_related_floors[] = $floors[(int) $id]->id;
			}
			foreach ($item->order_related_unit_id as $id) {
				$order_related_units[] = $units[(int) $id]->id;
			}

			foreach ($item->demand_related_block_id as $id) {
				$demand_related_blocks[] = $blocks[(int) $id]->id;
			}
			foreach ($item->demand_related_floor_id as $id) {
				$demand_related_floors[] = $floors[(int) $id]->id;
			}
			foreach ($item->demand_related_unit_id as $id) {
				$demand_related_units[] = $units[(int) $id]->id;
			}

			$department = new Department();
			$department->business_id = $business_id;
			$department->name = (string) $name;
			$department->order_related_all_units = $order_related_all_units;
			$department->order_related_blocks = $order_related_blocks;
			$department->order_related_floors = $order_related_floors;
			$department->order_related_units = $order_related_units;
			$department->demand_related_all_units = $demand_related_all_units;
			$department->demand_related_blocks = $demand_related_blocks;
			$department->demand_related_floors = $demand_related_floors;
			$department->demand_related_units = $demand_related_units;

			$department->save();
			$departments[(string) $name] = $department;
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
				if (isset($departments[(string) $key])) {
					$department_ids[] = $departments[(string) $key]->id;
				}
			}
			$user->departments()->sync($department_ids);
		}
	}
}
