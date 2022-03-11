<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Demand extends Model
{
	use HasTranslations;

	protected $translatable = [
		'name',
		'description',
	];

	protected $attributes = [
		'business_id' => 0, // [type:integer, class:Business] Business ID
		'category_id' => 0, // [type:integer, class:Category] Category ID
	];

	protected $casts = [
		'business_id' => 'integer',
		'category_id' => 'integer',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
