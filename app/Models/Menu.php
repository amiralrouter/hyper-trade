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

		'slug' => null, // [type:string, max:128, nullable] Slug

		'is_active' => true, // [type:boolean] Is active
	];

	protected $casts = [
		'business_id' => 'integer',
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
}
