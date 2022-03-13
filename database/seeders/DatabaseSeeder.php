<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Helpers\BusinessBuilder;

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

		$builder = new BusinessBuilder();
		$builder->setName('Babos Hotel');
		$builder->setLanguageId(2);
		$builder->setRoomCount(10);
		$builder->setDeskCount(10);
		$builder->build();
	}
}
