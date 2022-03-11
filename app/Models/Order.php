<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $attributes = [
		'business_id' => 0, // [type:integer, class:Business] Business ID
		'wallet_id' => 0, // [type:integer, class:Wallet] Wallet ID
	];

	protected $casts = [
		'business_id' => 'integer',
		'wallet_id' => 'integer',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
