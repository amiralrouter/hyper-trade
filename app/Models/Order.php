<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $attributes = [
		'business_id' => null, // [type:integer, model:Business] Business ID
		'wallet_id' => null, // [type:integer, model:Wallet] Wallet ID

		'guest_id' => null, // [type:integer, model:Guest] Guest ID

		'note' => null, // [type:string, dbType:text, nullable] Note
	];

	protected $casts = [
		'business_id' => 'integer',
		'wallet_id' => 'integer',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	protected $dispatchesEvents = [
		'created' => \App\Events\OrderCreated::class,
	];
}
