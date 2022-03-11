<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class() extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('businesses', function (Blueprint $table): void {
			$table->id();
			$table->json('namespace')->default('{}');
			$table->json('use')->default('{}');
			$table->json('class')->default('{}');
			$table->json('protected')->default('{}');
			$table->json('name')->default('{}');
			$table->json('type')->default('{}');
			$table->json('size')->default('{}');
			$table->json('nullable')->default('{}');
			$table->json('language_id')->default('{}');
			$table->json('type')->default('{}');
			$table->json('class')->default('{}');
			$table->json('global_block_id')->default('{}');
			$table->json('type')->default('{}');
			$table->json('class')->default('{}');
			$table->string('name')->nullable();
			$table->foreignId('language_id')->constrained()->comment('Language ID (Foreign key) default: 1 - English');
			$table->foreignId('global_block_id')->constrained()->comment('Global Block ID (Foreign key) default: 0');
			$table->timestamps();
		});

		DB::update('ALTER TABLE businesses AUTO_INCREMENT = 1000;');
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('businesses');
	}
};
