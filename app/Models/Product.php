<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
	use HasTranslations;

	protected $translatable = [
		'name',
		'description',
	];

	protected $attributes = [
		'business_id' => null, // [type:integer, model:Business] Business ID

		'code' => null, // [type:string, max:64, nullable] Product code

		'price' => 0.0, // [type:float] Price
		'preparation_time' => 0, // [type:integer] Preparation time in minutes

		'is_active' => true, // [type:boolean] Is active
		'is_deleted' => false, // [type:boolean] Is deleted
	];

	protected $casts = [
		'business_id' => 'integer',
		'code' => 'string',
		'price' => 'float',
		'preparation_time' => 'integer',
		'is_active' => 'boolean',
		'is_deleted' => 'boolean',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	public function categories()
	{
		return $this->belongsToMany(Category::class);
	}

	public function menus()
	{
		return $this->belongsToMany(Menu::class);
	}

	public function materials()
	{
		return $this->belongsToMany(Material::class);
	}

	public function business()
	{
		return $this->belongsTo(Business::class);
	}

	public function units()
	{
		return $this->belongsToMany(Unit::class);
	}

	public function syncUnits()
	{
		$menus = $this->menus()->get();
		$unit_ids = [];
		foreach ($menus as $menu) {
			$menu_units = $menu->units()->get();
			foreach ($menu_units as $unit) {
				$unit_ids[] = $unit->id;
			}
		}
		$this->units()->sync($unit_ids);

		return $this;
	}
}
