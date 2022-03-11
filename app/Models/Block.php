<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Block extends Model
{
	use HasTranslations;

	protected $translatable = [
		'name',
	];

	protected $attributes = [
		'business_id' => 0, // [type:integer, class:Business] Business ID

		'is_global' => false, // [type:boolean] Is global
	];

	protected $casts = [
		'business_id' => 'integer',
		'is_global' => 'boolean',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	public function business()
	{
		return $this->belongsTo(Business::class);
	}

	public function floors()
	{
		return $this->hasMany(Floor::class);
	}
}
