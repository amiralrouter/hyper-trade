<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		Language::create([
			'name' => 'English',
			'native' => 'English',
			'locale' => 'en_EN',
			'is_default' => true,
		]);
		Language::create([
			'name' => 'Turkish',
			'native' => 'Türkçe',
			'locale' => 'tr_TR',
			'is_default' => false,
		]);
	}
}
