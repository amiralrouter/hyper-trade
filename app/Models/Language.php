<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
	protected $attributes = [
		'name' => '', // [type:string, length:16] Language name
		'native' => '', // [type:string, length:16] Native name
		'locale' => 'en_US', // [type:string, length:5] Locale
		'is_default' => false, // [type:boolean] Is default language
	];

	protected $casts = [
		'name' => 'string',
		'native' => 'string',
		'locale' => 'string',
		'is_default' => 'boolean',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
