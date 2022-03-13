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
		Schema::create('categories', function (Blueprint $table): void {
			$table->id();
			$table->json('name')->default('{}');
			$table->json('description')->default('{}');
			$table->foreignId('business_id')->constrained()->comment('Business ID');
			$table->enum('int',[1, 2])->default(1)->comment('Category type');
			$table->boolean('is_active')->comment('Is active');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('categories');
	}
};
