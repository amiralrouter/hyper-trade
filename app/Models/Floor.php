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
		'business_id' => 0, // [type:integer, class:Business] Business ID
		'block_id' => 0, // [type:integer, class:Block] Block ID

		'is_global' => false, // [type:boolean] Is global
	];

	protected $casts = [
		'business_id' => 'integer',
		'block_id' => 'integer',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
