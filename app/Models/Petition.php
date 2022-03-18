<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
	protected $attributes = [
		'business_id' => null, // [type:integer, model:Business] Business ID
		'unit_id' => null, // [type:integer, model:Unit] Unit ID
		'demand_id' => null, // [type:integer, model:Demand] Demand ID
	];

	protected $casts = [
		'business_id' => 'integer',
		'unit_id' => 'integer',
		'demand_id' => 'integer',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
