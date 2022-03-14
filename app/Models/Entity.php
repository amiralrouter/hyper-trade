<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
	protected $attributes = [
		'business_id' => null, // [type:integer, model:Business] Business ID
		'order_id' => null, // [type:integer, model:Order] Order ID
		'product_id' => null, // [type:integer, model:Product] Product ID

		'price' => 0.0, // [type:float] Price
		'quantity' => 0, // [type:integer] Quantity
		'total_price' => 0.0, // [type:float] Total price

		'note' => null, // [type:string, dbType:text, nullable] Note
	];

	protected $casts = [
		'business_id' => 'integer',
		'order_id' => 'integer',
		'product_id' => 'integer',
		'price' => 'float',
		'quantity' => 'integer',
		'total_price' => 'float',
		'note' => 'string',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
