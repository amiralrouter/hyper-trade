<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Department extends Model
{
	use HasTranslations;

	protected $translatable = [
		'name',
	];

	protected $attributes = [
		'business_id' => null, // [type:integer, model:Business] Business ID
		'is_admin_department' => false, // [type:boolean] Is admin department
		'can_manage_units' => false, // [type:boolean] Can manage units
	];

	protected $casts = [
		'business_id' => 'integer',
		'is_admin_department' => 'boolean',
		'can_manage_units' => 'boolean',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
