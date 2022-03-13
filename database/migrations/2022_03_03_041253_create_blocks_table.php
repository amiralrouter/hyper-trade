<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('blocks', function (Blueprint $table): void {
			$table->id();
			$table->json('name');
			$table->foreignId('business_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade')->comment('Business ID');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('blocks');
	}
};
