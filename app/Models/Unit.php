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
		'saving' => \App\Events\UnitSaving::class,
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
		// return $this->belongsToMany(User::class, 'user_unit')
		// 	->withPivot('is_primary', 'is_secondary', 'is_tertiary')
		// 	->withTimestamps();
		// return $this->hasMany(User::class);
	}

	public function reset(): void
	{
		event(new \App\Events\UnitReset($this));
	}
}
