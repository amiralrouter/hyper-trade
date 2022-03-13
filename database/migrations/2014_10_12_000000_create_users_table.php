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
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		Schema::create('users', function (Blueprint $table): void {
			$table->id();
			$table->foreignId('business_id')->constrained()->comment('Business ID');
			$table->string('firstname', 32)->comment('First name');
			$table->string('lastname', 32)->comment('Last name');
			$table->string('username')->comment('Username');
			$table->string('password')->comment('Password');
			$table->foreignId('language_id')->constrained()->comment('Language ID');
			$table->boolean('related_with_all_units')->comment('Related with all units');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('users');
	}
};
