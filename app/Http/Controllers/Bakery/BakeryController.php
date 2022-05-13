<?php

namespace App\Http\Controllers\Bakery;

use App\Http\Controllers\Controller;

class BakeryController extends Controller
{
	public function index()
	{
		return view('bakery.index');
	}

	public function editor()
	{
		return view('bakery.editor');
	}
}
