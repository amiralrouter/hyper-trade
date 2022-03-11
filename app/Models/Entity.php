<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
	protected $attributes = [
		'business_id' => 0, // [type:integer, class:Business] Business ID
		'order_id' => 0, // [type:integer, class:Order] Order ID
		'product_id' => 0, // [type:integer, class:Product] Product ID

		'price' => 0.0, // [type:float] Price
		'quantity' => 0, // [type:integer] Quantity
		'total_price' => 0.0, // [type:float] Total price
	];

	protected $casts = [
		'business_id' => 'integer',
		'order_id' => 'integer',
		'product_id' => 'integer',
		'price' => 'float',
		'quantity' => 'integer',
		'total_price' => 'float',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
