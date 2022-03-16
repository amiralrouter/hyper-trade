<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Unit extends Model
{
	use HasTranslations;

	protected $translatable = [
		'name',
	];

	protected $attributes = [
		'business_id' => null, // [type:integer, model:Business] Business ID
		'block_id' => null, // [type:integer, model:Block, nullable] Block ID
		'floor_id' => null, // [type:integer, model:Floor, nullable] Floor ID
		'unit_type_id' => null, // [type:integer, model:UnitType] Unit Type ID

		'pin' => '', // [type:string, max:6] PIN

		'wallet_id' => null, // [type:integer, model:Wallet, nullable] Wallet ID

		'is_active' => true, // [type:boolean] Is Active
	];

	protected $casts = [
		'business_id' => 'integer',
		'block_id' => 'integer',
		'floor_id' => 'integer',
		'unit_type_id' => 'integer',
		'pin' => 'string',
		'wallet_id' => 'integer',
		'is_active' => 'boolean',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	protected $dispatchesEvents = [
		'created' => \App\Events\UnitCreated::class,
		'deleting' => \App\Events\UnitDeleting::class,
		'updated' => \App\Events\UnitUpdated::class,
	];

	protected static function boot(): void
	{
		parent::boot();
		static::saving(function ($unit): void {
			$floor_id = $unit->floor_id;
			$floor = Floor::find($floor_id);

			if ($floor) {
				$block_id = $floor->block_id;
				$block = Block::find($block_id);

				if ($block) {
					$unit->block_id = $block_id;
				}
			}
		});
	}

	public function business()
	{
		return $this->belongsTo(Business::class);
	}

	public function block()
	{
		return $this->belongsTo(Block::class);
	}

	public function floor()
	{
		return $this->belongsTo(Floor::class);
	}

	public function unit_type()
	{
		return $this->belongsTo(UnitType::class);
	}

	public function wallet()
	{
		return $this->belongsTo(Wallet::class);
	}

	public function menus()
	{
		return $this->belongsToMany(Menu::class);
	}

	public function products()
	{
		return $this->belongsToMany(Product::class);
	}

	public function order_users()
	{
		return $this->belongsToMany(User::class, 'unit_order_user', 'unit_id', 'user_id');
	}

	public function demand_users()
	{
		return $this->belongsToMany(User::class, 'unit_demand_user', 'unit_id', 'user_id');
	}

	public function reset(): void
	{
		event(new \App\Events\UnitReset($this));
	}
}
