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
		'blocks' => '[]', // [type:array, dbType:json] Blocks
		'floors' => '[]', // [type:array, dbType:json] Floors
		'all_units' => false, // [type:boolean]
		'units' => '[]', // [type:array, dbType:json] Units

		'slug' => null, // [type:string, max:128, nullable] Slug

		'is_active' => true, // [type:boolean] Is active
	];

	protected $casts = [
		'business_id' => 'integer',
		'all_blocks' => 'boolean',
		'blocks' => 'array',
		'floors' => 'array',
		'all_units' => 'boolean',
		'units' => 'array',
		'slug' => 'string',
		'is_active' => 'boolean',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	public function products()
	{
		return $this->belongsToMany(Product::class);
	}

	public function business()
	{
		return $this->belongsTo(Business::class);
	}

	public function units()
	{
		return $this->belongsToMany(Unit::class);
	}
}
