<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Unit extends Model
{
	use HasTranslations;

	protected $translatable = [
		'name',
	];

	protected $attributes = [
		'business_id' => 0, // [type:integer, class:Business] Business ID
		'block_id' => 0, // [type:integer, class:Block] Block ID
		'floor_id' => 0, // [type:integer, class:Floor] Floor ID
		'unit_type_id' => 0, // [type:integer, class:UnitType] Unit Type ID
	];

	protected $casts = [
		'business_id' => 'integer',
		'block_id' => 'integer',
		'floor_id' => 'integer',
		'unit_type_id' => 'integer',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	public function block()
	{
		return $this->belongsTo(Block::class);
	}

	public function floor()
	{
		return $this->belongsTo(Floor::class);
	}

	public function unit_type()
	{
		return $this->belongsTo(UnitType::class);
	}
}
