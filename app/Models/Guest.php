<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
	protected $attributes = [
		'business_id' => null, // [type:integer, model:Business] Business ID

		'language_id' => 1, // [type:integer, model:Language] Language ID (Foreign key) default: 1 - English

		'fullname' => '', // [type:string, size:64, nullable:true]
	];

	protected $casts = [
		'business_id' => 'integer',
		'language_id' => 'integer',
		'fullname' => 'string',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	public function business()
	{
		return $this->belongsTo(Business::class);
	}

	public function language()
	{
		return $this->belongsTo(Language::class);
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}
}
