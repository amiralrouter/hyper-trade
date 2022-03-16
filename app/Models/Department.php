<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Department extends Model
{
	use HasTranslations;

	protected $translatable = [
		'name',
	];

	protected $attributes = [
		'business_id' => null, // [type:integer, model:Business] Business ID
		'is_admin_department' => false, // [type:boolean] Is admin department
		'can_manage_units' => false, // [type:boolean] Can manage units

		'order_related_all_units' => false, // [type:boolean] Order related all units
		'order_related_blocks' => '[]', // [type:array, dbType:json] Blocks related to orders
		'order_related_floors' => '[]', // [type:array, dbType:json] Floors related to orders
		'order_related_units' => '[]', // [type:array, dbType:json] Units related to orders

		'demand_related_all_units' => false, // [type:boolean] Demand related all units
		'demand_related_blocks' => '[]', // [type:array, dbType:json] Blocks related to demands
		'demand_related_floors' => '[]', // [type:array, dbType:json] Floors related to demands
		'demand_related_units' => '[]', // [type:array, dbType:json] Units related to demands

		'slug' => null, // [type:string, max:128, nullable] Slug
	];

	protected $casts = [
		'business_id' => 'integer',
		'is_admin_department' => 'boolean',
		'can_manage_units' => 'boolean',
		'order_related_all_units' => 'boolean',
		'order_related_blocks' => 'array',
		'order_related_floors' => 'array',
		'order_related_units' => 'array',
		'demand_related_all_units' => 'boolean',
		'demand_related_blocks' => 'array',
		'demand_related_floors' => 'array',
		'demand_related_units' => 'array',
		'slug' => 'string',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
