<?php

use App\Models\Unit;
use App\Models\Business;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

// group by /b
Route::group(['prefix' => 'b/{business:id}/u/{unit:id}'], function (): void {
	// get for /b/:business_id/u/:unit_id
	Route::get('/', function (Business $business, Unit $unit) {
		// echo 'Business: ' . $business->name . PHP_EOL;
		// echo 'Unit: ' . $unit->id . PHP_EOL;

		return $unit->products;

		return $unit->menus;
	});
});
