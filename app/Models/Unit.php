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
		'business_id' => 0, // [type:integer, class:Business] Business ID
		'block_id' => 0, // [type:integer, class:Block] Block ID
		'floor_id' => 0, // [type:integer, class:Floor] Floor ID
		'unit_type_id' => 0, // [type:integer, class:UnitType] Unit Type ID

		'pin' => '', // [type:string, max:6] PIN

		'wallet_id' => 0, // [type:integer, class:Wallet, nullable:true] Wallet ID
	];

	protected $casts = [
		'business_id' => 'integer',
		'block_id' => 'integer',
		'floor_id' => 'integer',
		'unit_type_id' => 'integer',
		'pin' => 'string',
		'wallet_id' => 'integer',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	protected $dispatchesEvents = [
		'created' => \App\Events\UnitCreated::class,
		'saved' => \App\Events\UnitSaved::class,
	];

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

	public function users(): void
	{
		// get users which are related_with_all_units, or related with this unit's floor or block id
		return $this->belongsToMany(User::class, 'user_unit')
			->withPivot('is_primary', 'is_secondary', 'is_tertiary')
			->withTimestamps();
		// return $this->hasMany(User::class);
	}

	public function reset(): void
	{
		event(new \App\Events\UnitReset($this));
	}
}
