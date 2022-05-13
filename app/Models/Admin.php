<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	protected $attributes = [
		'fullname' => '',
		'email' => '',
		'password' => '',
		'is_super' => false,
		'is_root' => false,
		'is_active' => false,
	];

	protected $casts = [];

	protected $appends = [];

	protected $guarded = [];

	protected $hidden = [];

	public static $checked = false;

	public static $current;

	public static function check()
	{
		self::$checked = true;
		$admin_id = session()->get('admin_id');
		if (!$admin_id) {
			return false;
		}
		$admin = self::where('id', $admin_id)->where('is_active', true)->first();
		if (!$admin) {
			self::$current = null;

			return false;
		}
		self::$current = $admin;
	}

	public static function getCurrent()
	{
		if (false === self::$checked) {
			self::check();
		}
		if (null !== self::$current) {
			return self::$current;
		}

		return null;
	}

	public static function setCurrent(self $admin)
	{
		session()->put('admin_id', $admin->id);

		return $admin;
	}
}
