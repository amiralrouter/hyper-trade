<?php

namespace App\Models;

use App\Enums\CategoryType;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
	use HasTranslations;

	protected $translatable = [
		'name',
	];

	protected $attributes = [
		'business_id' => null, // [type:integer, model:Business, nullable] Business ID
		'category_type' => CategoryType::PRODUCT, // [type:enum, enum:CategoryType, def:1] Category type

		'slug' => null, // [type:string, max:128, nullable] Slug

		'is_active' => true, // [type:boolean] Is active
	];

	protected $casts = [
		'business_id' => 'integer',
		'category_type' => CategoryType::class,
		'slug' => 'string',
		'is_active' => 'boolean',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	protected $dispatchesEvents = [
		'deleting' => \App\Events\CategoryDeleting::class,
	];

	public function business()
	{
		return $this->belongsTo(Business::class);
	}

	public function products()
	{
		return $this->belongsToMany(Product::class);
	}

	public function demands()
	{
		return $this->hasMany(Demand::class);
	}
}
