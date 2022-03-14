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

	protected $dispatchesEvents = [
		'deleting' => \App\Events\FloorDeleting::class,
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
