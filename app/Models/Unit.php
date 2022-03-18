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

		'is_active' => true, // [type:boolean] Is Active
	];

	protected $casts = [
		'business_id' => 'integer',
		'block_id' => 'integer',
		'floor_id' => 'integer',
		'unit_type_id' => 'integer',
		'pin' => 'string',
		'is_active' => 'boolean',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	// protected $dispatchesEvents = [
	// 	'created' => \App\Events\UnitCreated::class,
	// 	'deleting' => \App\Events\UnitDeleting::class,
	// 	'updated' => \App\Events\UnitUpdated::class,
	// ];

	// protected static function boot(): void
	// {
	// 	parent::boot();
	// 	static::saving(function ($unit): void {
	// 		$floor_id = $unit->floor_id;
	// 		$floor = Floor::find($floor_id);

	// 		if ($floor) {
	// 			$block_id = $floor->block_id;
	// 			$block = Block::find($block_id);

	// 			if ($block) {
	// 				$unit->block_id = $block_id;
	// 			}
	// 		}
	// 	});
	// }

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
		return $this->belongsTo(Wallet::class)->where('is_active', true);
	}

	public function wallets()
	{
		return $this->hasMany(Wallet::class);
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

	public function petition_users()
	{
		return $this->belongsToMany(User::class, 'unit_petition_user', 'unit_id', 'user_id');
	}

	public function reset()
	{
		// event(new \App\Events\UnitReset($this));
		$this->resetPin();
		$this->dropWallet();
		$this->createWallet();

		return $this;
	}

	public function resetPin()
	{
		$this->pin = random_int(100000, 999999);

		return $this;
	}

	public function dropWallet()
	{
		$wallet = $this->wallet;
		if ($wallet) {
			$wallet->is_active = false;
			$wallet->save();
		}

		return $this;
	}

	public function createWallet()
	{
		$wallet = new Wallet();
		$wallet->business_id = $this->business_id;
		$wallet->unit_id = $this->id;
		$wallet->save();

		return $this;
	}

	public function syncUsers()
	{
		$departments = Department::where('business_id', $this->business_id)->get();

		// ORDERS
		$related_departments = [];
		foreach ($departments as $department) {
			if ($department->order_all_units) {
				$related_departments[] = $department;
			} elseif (\in_array($this->id, (array) $department->order_units, true)) {
				$related_departments[] = $department;
			} elseif (\in_array($this->block_id, (array) $department->orders_blocks, true)) {
				$related_departments[] = $department;
			} elseif (\in_array($this->floor_id, (array) $department->orders_floors, true)) {
				$related_departments[] = $department;
			}
		}
		$this->order_users()->detach();
		foreach ($related_departments as $department) {
			foreach ($department->users as $user) {
				$this->order_users()->attach($user->id);
			}
		}

		// DEMANDS
		$related_departments = [];
		foreach ($departments as $department) {
			if ($department->petition_all_units) {
				$related_departments[] = $department;
			} elseif (\in_array($this->id, (array) $department->petition_units, true)) {
				$related_departments[] = $department;
			} elseif (\in_array($this->block_id, (array) $department->petition_blocks, true)) {
				$related_departments[] = $department;
			} elseif (\in_array($this->floor_id, (array) $department->petition_floors, true)) {
				$related_departments[] = $department;
			}
		}
		$this->petition_users()->detach();
		foreach ($related_departments as $department) {
			foreach ($department->users as $user) {
				$this->petition_users()->attach($user->id);
			}
		}

		return $this;
	}

	public function syncMenus()
	{
		$menus = Menu::where('business_id', $this->business_id)->get();

		foreach ($menus as $menu) {
			$menu->syncUnits();
		}

		return $this;
	}

	public function syncProducts()
	{
		return $this;
	}
}
