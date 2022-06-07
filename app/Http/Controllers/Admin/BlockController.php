<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Http\Controllers\Controller;

class BlockController extends Controller
{
	public function list()
	{
		return Inertia::render('block_list');
	}
}
