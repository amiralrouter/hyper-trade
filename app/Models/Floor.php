<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Floor extends Model
{
	use HasTranslations;

	protected $translatable = [
		'name',
	];

	protected $attributes = [
		'business_id' => null, // [type:integer, model:Business] Business ID
		'block_id' => null, // [type:integer, model:Block, nullable] Block ID
	];

	protected $casts = [
		'business_id' => 'integer',
		'block_id' => 'integer',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	public function business()
	{
		return $this->belongsTo(Business::class);
	}

	public function block()
	{
		return $this->belongsTo(Block::class);
	}

	public function units()
	{
		return $this->hasMany(Unit::class);
	}
}
