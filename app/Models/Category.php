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
		'description',
	];

	protected $attributes = [
		'business_id' => 0, // [type:integer, class:Business] Business ID
		'category_type' => CategoryType::PRODUCT, // [type:enum, enum:CategoryType, def:1] Category type

		'is_active' => true, // [type:boolean] Is active
	];

	protected $casts = [
		'business_id' => 'integer',
		'category_type' => CategoryType::class,
		'is_active' => 'boolean',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
