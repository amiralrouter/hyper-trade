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
		'business_id' => null, // [type:integer, model:Business] Business ID
		'category_id' => null, // [type:integer, model:Category, nullable] Category ID
		'is_paid' => false, // [type:boolean] Is Paid
	];

	protected $casts = [
		'business_id' => 'integer',
		'category_id' => 'integer',
		'is_paid' => 'boolean',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	protected $dispatchesEvents = [
		// 'deleting' => \App\Events\DemandDeleting::class,
	];

	public function business()
	{
		return $this->belongsTo(Business::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}
}
