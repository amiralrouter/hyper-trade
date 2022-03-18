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

		'order_all_units' => false, // [type:boolean] Order all units
		'order_blocks' => '[]', // [type:array, dbType:json] Blocks IDs
		'order_floors' => '[]', // [type:array, dbType:json] Floors IDs
		'order_units' => '[]', // [type:array, dbType:json] Units IDs

		'petition_all_units' => false, // [type:boolean] Petition all units
		'petition_blocks' => '[]', // [type:array, dbType:json] Blocks IDs
		'petition_floors' => '[]', // [type:array, dbType:json] Floors IDs
		'petition_units' => '[]', // [type:array, dbType:json] Units IDs

		'slug' => null, // [type:string, max:128, nullable] Slug
	];

	protected $casts = [
		'business_id' => 'integer',
		'is_admin_department' => 'boolean',
		'can_manage_units' => 'boolean',
		'order_all_units' => 'boolean',
		'order_blocks' => 'array',
		'order_floors' => 'array',
		'order_units' => 'array',
		'petition_all_units' => 'boolean',
		'petition_blocks' => 'array',
		'petition_floors' => 'array',
		'petition_units' => 'array',
		'slug' => 'string',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	public function business()
	{
		return $this->belongsTo(Business::class);
	}

	public function users()
	{
		return $this->belongsToMany(User::class);
	}
}
