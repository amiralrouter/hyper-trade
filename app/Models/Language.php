<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
	protected $attributes = [
		'name' => '', // [type:string, length:16] Language name
		'native' => '', // [type:string, length:16] Native name
		'code' => 'en', // [type:string, length:2] Language code
		'is_default' => false, // [type:boolean] Is default language
	];

	protected $casts = [
		'name' => 'string',
		'native' => 'string',
		'code' => 'string',
		'is_default' => 'boolean',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
