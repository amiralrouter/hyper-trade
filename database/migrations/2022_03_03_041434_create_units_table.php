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
		Schema::create('units', function (Blueprint $table): void {
			$table->id();
			$table->json('name')->default('{}');
			$table->foreignId('business_id')->constrained()->comment('Business ID');
			$table->foreignId('block_id')->constrained()->comment('Block ID');
			$table->foreignId('floor_id')->constrained()->comment('Floor ID');
			$table->foreignId('unit_type_id')->constrained()->comment('Unit Type ID');
			$table->string('pin')->comment('PIN');
			$table->foreignId('wallet_id')->constrained()->nullable()->comment('Wallet ID');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('units');
	}
};
