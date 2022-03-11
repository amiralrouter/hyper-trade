<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
	protected $attributes = [
		'business_id' => 0, // [type:integer, class:Business] Business ID
		'unit_id' => 0, // [type:integer, class:UnitType] Unit Type ID
	];

	protected $casts = [
		'business_id' => 'integer',
		'unit_id' => 'integer',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
