<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
	public function login()
	{
		return view('admin.office.login');
	}

	public function register()
	{
		return view('admin.office.register');
	}
}
