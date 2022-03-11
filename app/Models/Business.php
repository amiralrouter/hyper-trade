<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
	use HasFactory;

	protected $attributes = [
		'name' => '', // [type:string, size:64, nullable:true]

		'language_id' => 1, // [type:integer, class:Language] Language ID (Foreign key) default: 1 - English
	];

	protected $casts = [
		'name' => 'string',
		'language_id' => 'integer',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
