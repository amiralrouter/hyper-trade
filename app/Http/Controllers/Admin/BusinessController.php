<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Http\Controllers\Controller;

class BusinessController extends Controller
{
	public function list()
	{
		return Inertia::render('index', [
			'name' => 'Amiral Router',
		]);
	}
}
