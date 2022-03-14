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
		Schema::create('products', function (Blueprint $table): void {
			$table->id();
			$table->json('name')->default('{}');
			$table->json('description')->default('{}');
			$table->foreignId('business_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->comment('Business ID');
			$table->string('code')->nullable()->comment('Product code');
			$table->float('price')->comment('Price');
			$table->integer('preparation_time')->comment('Preparation time in minutes');
			$table->boolean('is_active')->comment('Is active');
			$table->boolean('is_deleted')->comment('Is deleted');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('products');
	}
};
