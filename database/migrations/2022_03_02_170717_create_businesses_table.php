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
			$table->string('name', 64)->nullable();
			$table->foreignId('language_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->comment('Language ID (Foreign key) default: 1 - English');
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
