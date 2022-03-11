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
			$table->string('firstname')->comment('First name');
			$table->string('lastname')->comment('Last name');
			$table->string('username')->comment('Username');
			$table->string('password')->comment('Password');
			$table->foreignId('language_id')->constrained()->comment('Language ID');
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
