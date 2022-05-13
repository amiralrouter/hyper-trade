<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
	public function signin()
	{
		return view('admin.auth.signin');
	}

	public function signup()
	{
		return view('admin.auth.signup');
	}
}
