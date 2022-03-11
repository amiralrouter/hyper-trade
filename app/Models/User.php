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
	];

	protected $casts = [
		'business_id' => 'integer',
		'firstname' => 'string',
		'lastname' => 'string',
		'username' => 'string',
		'password' => 'string',
		'language_id' => 'integer',
	];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	protected $dispatchesEvents = [
		'created' => \App\Events\UserCreated::class,
		'deleting' => \App\Events\UserDeleting::class,
	];
	// public static function boot(): void
	// {
	// 	parent::boot();

	// 	static::creating(function (self $model): void {
	// 		$model->password = bcrypt($model->password);
	// 	});

	// 	static::created(function (self $model): void {
	// 		$user_telegram = new UserTelegram();
	// 		$user_telegram->user_id = $model->id;
	// 		$user_telegram->chat_id = 0;
	// 		$user_telegram->save();
	// 	});

	// 	static::deleting(function (self $model): void {
	// 		$user_telegram = UserTelegram::where('user_id', $model->id)->first();
	// 		if ($user_telegram) {
	// 			$user_telegram->delete();
	// 		}
	// 	});
	// }

	public function departments()
	{
		return $this->belongsToMany(Department::class);
	}

	public function telegram()
	{
		return $this->belongsTo(UserTelegram::class);
	}
}
