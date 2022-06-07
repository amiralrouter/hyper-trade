<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Http\Controllers\Controller;

class FloorController extends Controller
{
	public function list()
	{
		return Inertia::render('floor_list');
	}
}
