<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
	protected $attributes = [
		'name' => '', // [type:string, size:64, nullable:true]

		'language_id' => 1, // [type:integer, class:Language] Language ID (Foreign key) default: 1 - English

		'global_block_id' => 0, // [type:integer, class:Block] Global Block ID (Foreign key) default: 0
	];

	protected $casts = [
		'name' => 'string',
		'language_id' => 'integer',
		'global_block_id' => 'integer',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	protected $dispatchesEvents = [
		'created' => \App\Events\BusinessCreated::class,
	];

	public function language()
	{
		return $this->belongsTo(Language::class);
	}

	public function blocks()
	{
		return $this->hasMany(Block::class)->where('is_global', false);
	}

	public function global_block()
	{
		return $this->hasOne(Block::class)->where('is_global', true);
	}

	public function floors()
	{
		return $this->hasMany(Floor::class)->where('is_global', false);
	}

	public function global_floor()
	{
		return $this->hasOne(Floor::class)->where('is_global', true);
	}
}
