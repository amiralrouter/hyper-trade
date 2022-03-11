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
		'business_id' => 0, // [type:integer, class:Business] Business ID

		'firstname' => '', // [type:string, length:32] First name
		'lastname' => '', // [type:string, length:32] Last name

		'username' => '', // [type:string] Username
		'password' => '', // [type:string] Password

		'language_id' => 0, // [type:integer, class:Language] Language ID

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

	protected $dispatchesEvents = [
		'created' => \App\Events\UserCreated::class,
		'deleting' => \App\Events\UserDeleting::class,
	];

	public function departments()
	{
		return $this->belongsToMany(Department::class);
	}

	public function telegram()
	{
		return $this->belongsTo(UserTelegram::class);
	}
}
