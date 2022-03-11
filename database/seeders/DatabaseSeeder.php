<?php

namespace Database\Seeders;

use App\Models\Block;
use App\Models\Business;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		// \App\Models\User::factory(10)->create();

		// call LanguageSeeder
		$this->call(LanguageSeeder::class);

		$business = Business::create();

		$block = Block::create([
			'business_id' => $business->id,
			'name' => 'Block 1',
			'description' => 'Block 1 description',
			'is_active' => true,
		]);
	}
}
