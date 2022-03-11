<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
	protected $attributes = [
		'business_id' => 0, // [type:integer, class:Business] Business ID
		'unit_id' => 0, // [type:integer, class:UnitType] Unit Type ID

		'is_active' => true, // [type:boolean] Is Active
	];

	protected $casts = [
		'business_id' => 'integer',
		'unit_id' => 'integer',
		'is_active' => 'boolean',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
