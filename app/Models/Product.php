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
		'business_id' => 0, // [type:integer, class:Business] Business ID

		'price' => 0.0, // [type:float] Price
		'preparation_time' => 0, // [type:integer] Preparation time in minutes

		'is_active' => true, // [type:boolean] Is active
		'is_deleted' => false, // [type:boolean] Is deleted
	];

	protected $casts = [
		'business_id' => 'integer',
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
}
