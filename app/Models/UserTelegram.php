<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTelegram extends Model
{
	protected $attributes = [
		'user_id' => 0, // [type:integer, class:User] User ID

		'chat_id' => 0, // [type:integer] Telegram ID of the user

		'verification_code' => '', // [type:string, size:8, nullable] Verification code
		'verified' => false, // [type:boolean] Is verified
	];

	protected $casts = [
		'user_id' => 'integer',
		'chat_id' => 'integer',
		'verification_code' => 'string',
		'verified' => 'boolean',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];
}
