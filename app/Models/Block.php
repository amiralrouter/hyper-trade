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
	];

	protected $casts = [
		'business_id' => 'integer',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
