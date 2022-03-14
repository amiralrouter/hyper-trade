<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Material extends Model
{
	use HasTranslations;

	protected $translatable = [
		'name',
	];

	protected $attributes = [
		'business_id' => null, // [type:integer, model:Business] Business ID
		'slug' => null, // [type:string, max:128, nullable] Slug
	];

	protected $casts = [
		'business_id' => 'integer',
		'slug' => 'string',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
