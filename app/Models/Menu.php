<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Menu extends Model
{
	use HasTranslations;

	protected $translatable = [
		'name',
		'description',
	];

	protected $attributes = [
		'business_id' => 0, // [type:integer, class:Business] Business ID

		'is_active' => true, // [type:boolean] Is active
	];

	protected $casts = [
		'business_id' => 'integer',
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
