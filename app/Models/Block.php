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
		'business_id' => null, // [type:integer, model:Business, nullable] Business ID
	];

	protected $casts = [
		'business_id' => 'integer',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	protected $dispatchesEvents = [
		'deleting' => \App\Events\BlockDeleting::class,
	];

	public function business()
	{
		return $this->belongsTo(Business::class);
	}

	public function floors()
	{
		return $this->hasMany(Floor::class);
	}
}
