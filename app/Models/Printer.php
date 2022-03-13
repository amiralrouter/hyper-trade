<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
	protected $attributes = [
		'business_id' => null, // [type:integer, model:Business] Business ID
		'name' => '', // [type:string, size:64, nullable:true]
		'uuid' => '', // [type:string, size:64, nullable:true]
	];

	protected $casts = [
		'business_id' => 'integer',
		'name' => 'string',
		'uuid' => 'string',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	protected $dispatchesEvents = [
		'created' => \App\Events\PrinterCreated::class,
	];

	public function business()
	{
		return $this->belongsTo(Business::class);
	}
}
