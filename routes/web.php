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

Route::group(['prefix' => 'admin'], function (): void {
	Route::group(['prefix' => 'auth'], function (): void {
		Route::get('/signin', [App\Http\Controllers\Admin\AuthController::class, 'signin'])->name('admin.auth.signin');
		Route::get('/signup', [App\Http\Controllers\Admin\AuthController::class, 'signup'])->name('admin.auth.signup');
		Route::get('/password_request', [App\Http\Controllers\Admin\AuthController::class, 'signup'])->name('admin.auth.password_request');
	});
	Route::group(['middleware' => 'auth.admin'], function (): void {
		// Route::get('/', [App\Http\Controllers\Admin\BusinessController::class, 'list'])->name('admin.business.list');
	});
	Route::get('/', [App\Http\Controllers\Admin\BusinessController::class, 'list'])->name('admin.business.list');
	Route::get('/block', [App\Http\Controllers\Admin\BlockController::class, 'list'])->name('admin.block.list');
	Route::get('/floor', [App\Http\Controllers\Admin\FloorController::class, 'list'])->name('admin.floor.list');
});

Route::group(['prefix' => 'office'], function (): void {
	Route::group(['prefix' => 'auth'], function (): void {
		Route::get('/login', [App\Http\Controllers\Office\AuthController::class, 'login'])->name('office.auth.login');
		Route::get('/token', [App\Http\Controllers\Office\AuthController::class, 'token'])->name('office.auth.token');
	});
	Route::group(['middleware' => 'auth.office'], function (): void {
		// Route::get('/', [App\Http\Controllers\Office\HomeController::class, 'index'])->name('office.home.index');
	});
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

Route::get('/bakery', [App\Http\Controllers\Bakery\BakeryController::class, 'index']);
Route::get('/bakery/editor', [App\Http\Controllers\Bakery\BakeryController::class, 'editor']);

Route::get('/ui/{page}', function () {
	return view('ui.' . request()->route('page'));
});

Route::get('/', function () {
	return view('welcome');
});
