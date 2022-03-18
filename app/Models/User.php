<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
	use HasApiTokens;
	use HasFactory;
	use Notifiable;

	protected $attributes = [
		'business_id' => null, // [type:integer, model:Business] Business ID

		'firstname' => '', // [type:string, length:32] First name
		'lastname' => '', // [type:string, length:32] Last name

		'username' => '', // [type:string] Username
		'password' => '', // [type:string] Password

		'language_id' => 1, // [type:integer, model:Language] Language ID

		'related_with_all_units' => false, // [type:boolean] Related with all units
	];

	protected $casts = [
		'business_id' => 'integer',
		'firstname' => 'string',
		'lastname' => 'string',
		'username' => 'string',
		'password' => 'string',
		'language_id' => 'integer',
		'related_with_all_units' => 'boolean',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	public function departments()
	{
		return $this->belongsToMany(Department::class);
	}

	public function telegram()
	{
		return $this->belongsTo(UserTelegram::class);
	}

	public function order_units()
	{
		return $this->belongsToMany(self::class, 'unit_order_user', 'user_id', 'unit_id');
	}

	public function petition_units()
	{
		return $this->belongsToMany(self::class, 'unit_petition_user', 'user_id', 'unit_id');
	}

	public function syncUnits()
	{
		$departments = $this->departments()->get();
		$units = Unit::where('business_id', $this->business_id)->get();
		$order_units_ids = [];
		$petition_units_ids = [];
		foreach ($departments as $department) {
			if ($department->order_all_units) {
				$ids = $units->pluck('id')->toArray();
				$order_units_ids = array_merge($order_units_ids, $ids);
			} elseif ($department->order_blocks) {
				$ids = $units->whereIn('block_id', $department->order_blocks)->pluck('id')->toArray();
				$order_units_ids = array_merge($order_units_ids, $ids);
			} elseif ($department->order_floors) {
				$ids = $units->whereIn('floor_id', $department->order_floors)->pluck('id')->toArray();
				$order_units_ids = array_merge($order_units_ids, $ids);
			} elseif ($department->order_units) {
				$ids = $units->whereIn('id', $department->order_units)->pluck('id')->toArray();
				$order_units_ids = array_merge($order_units_ids, $ids);
			}

			if ($department->petition_all_units) {
				$ids = $units->pluck('id')->toArray();
				$petition_units_ids = array_merge($petition_units_ids, $ids);
			} elseif ($department->petition_blocks) {
				$ids = $units->whereIn('block_id', $department->petition_blocks)->pluck('id')->toArray();
				$petition_units_ids = array_merge($petition_units_ids, $ids);
			} elseif ($department->petition_floors) {
				$ids = $units->whereIn('floor_id', $department->petition_floors)->pluck('id')->toArray();
				$petition_units_ids = array_merge($petition_units_ids, $ids);
			} elseif ($department->petition_units) {
				$ids = $units->whereIn('id', $department->petition_units)->pluck('id')->toArray();
				$petition_units_ids = array_merge($petition_units_ids, $ids);
			}
		}

		$order_units_ids = array_unique($order_units_ids);
		$petition_units_ids = array_unique($petition_units_ids);

		$this->order_units()->sync($order_units_ids);
		$this->petition_units()->sync($petition_units_ids);

		return $this;
	}
}
