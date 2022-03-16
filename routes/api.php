<?php

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	return $request->user();
});

// get for /test/:business_id
Route::get('/test/{business_id}', function ($business_id) {
	return Business::with([
		'categories',
		'menus',
		'blocks',
		'floors',
		'unit_types',
		'units',
		'materials',
		'products',
	])->find($business_id);
});
