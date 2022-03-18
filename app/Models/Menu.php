<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Menu extends Model
{
	use HasTranslations;

	protected $translatable = [
		'name',
	];

	protected $attributes = [
		'business_id' => null, // [type:integer, model:Business] Business ID

		'all_blocks' => false, // [type:boolean]
		'block_ids' => '[]', // [type:array, dbType:json] Blocks
		'floor_ids' => '[]', // [type:array, dbType:json] Floors
		'all_units' => false, // [type:boolean]
		'unit_ids' => '[]', // [type:array, dbType:json] Units

		'slug' => null, // [type:string, max:128, nullable] Slug

		'is_active' => true, // [type:boolean] Is active
	];

	protected $casts = [
		'business_id' => 'integer',
		'all_blocks' => 'boolean',
		'block_ids' => 'array',
		'floor_ids' => 'array',
		'all_units' => 'boolean',
		'unit_ids' => 'array',
		'slug' => 'string',
		'is_active' => 'boolean',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	public function business()
	{
		return $this->belongsTo(Business::class);
	}

	public function products()
	{
		return $this->belongsToMany(Product::class);
	}

	public function units()
	{
		return $this->belongsToMany(Unit::class);
	}

	public function syncUnits(): void
	{
		$units = Unit::where('business_id', $this->business_id)->get();

		$unit_ids = [];

		if ($this->all_blocks || $this->all_units) {
			$unit_ids = $units->pluck('id')->toArray();
		} else {
			if ($this->blocks) {
				$blocks = Block::whereIn('id', $this->block_ids)->get();
				$unit_ids = $blocks->pluck('units')->flatten()->pluck('id')->toArray();
			}

			if ($this->floors) {
				$floors = Floor::whereIn('id', $this->floor_ids)->get();
				$unit_ids = array_merge($unit_ids, $floors->pluck('units')->flatten()->pluck('id')->toArray());
			}

			if ($this->units) {
				$unit_ids = array_merge($unit_ids, $this->unit_ids);
			}
		}

		$this->units()->sync($unit_ids);

		foreach ($this->products as $product) {
			$product->syncUnits();
		}
	}
}
