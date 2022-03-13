<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
	protected $attributes = [
		'business_id' => null, // [type:integer, model:Business] Business ID
		'unit_id' => null, // [type:integer, model:UnitType] Unit Type ID

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
