<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
	protected $attributes = [
		'name' => '', // [type:string, size:64, nullable:true]

		'language_id' => 1, // [type:integer, model:Language] Language ID (Foreign key) default: 1 - English
	];

	protected $casts = [
		'name' => 'string',
		'language_id' => 'integer',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	public function language()
	{
		return $this->belongsTo(Language::class);
	}

	public function blocks()
	{
		return $this->hasMany(Block::class);
	}

	public function floors()
	{
		return $this->hasMany(Floor::class);
	}

	public function unit_types()
	{
		return $this->hasMany(UnitType::class);
	}

	public function units()
	{
		return $this->hasMany(Unit::class);
	}

	public function categories()
	{
		return $this->hasMany(Category::class);
	}

	public function menus()
	{
		return $this->hasMany(Menu::class);
	}

	public function materials()
	{
		return $this->hasMany(Material::class);
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}

	public function demands()
	{
		return $this->hasMany(Demand::class);
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
